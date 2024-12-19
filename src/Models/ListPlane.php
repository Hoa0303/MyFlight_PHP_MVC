<?php

namespace App\Models;

use PDO;

class ListPlane
{
    private PDO $connection;

    public string $sohieu;
    public string $soghe;
    public string $mahang;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all ListPlane from database
     *
     * @return ListPlane[]
     */

    public function all(): array
    {
        $listplanes = [];

        $sql = 'SELECT * FROM maybay';

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        while ($row = $statement->fetch()) {
            $listplane = new ListPlane($this->connection);
            $listplane->fromDbRow($row);
            $listplanes[] = $listplane;
        }

        return $listplanes;
    }

    private function fromDbRow(array $row): void
    {
        $this->sohieu = $row['SoHieu'];
        $this->soghe = $row['SoGhe'];
        $this->mahang = $row['MaHang'];
    }

    public function fill(array $data): ListPlane
    {
        $this->sohieu = $data['sohieu'];
        $this->soghe = $data['soghe'];
        $this->mahang = $data['mahang'];
        return $this;
    }

    public function add(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO maybay (sohieu, soghe, mahang)
            VALUES (:sohieu, :soghe, :mahang)
        SQL);
        $statement->execute([
            'sohieu' => $this->sohieu,
            'soghe' => $this->soghe,
            'mahang' => $this->mahang,
        ]);
        if ($statement->rowCount() === 1) {
            $this->sohieu = (int)$this->connection->lastInsertId();
        }
        return $statement->rowCount() === 1;
    }

    public function findById($sohieu): ?ListPlane
    {
        $statement = $this->connection->prepare('SELECT * FROM maybay WHERE sohieu = :sohieu');
        $statement->execute(['sohieu' => $sohieu]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $listplane = new ListPlane($this->connection);
        $listplane->fromDbRow($row);
        return $listplane;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE maybay
            SET               
                soghe = :soghe,
                mahang = :mahang
            WHERE sohieu = :sohieu
            SQL);
        $statement->execute([
            'sohieu' => $this->sohieu,
            'soghe' => $this->soghe,
            'mahang' => $this->mahang,
        ]);
        return $statement->rowCount() === 1;
    }

    public function delete($sohieu): bool
    {
        $statement = $this->connection->prepare('DELETE FROM maybay WHERE sohieu = :sohieu');
        $statement->execute(['sohieu' => $sohieu]);
        return $statement->rowCount() === 1;
    }
}
