<?php

namespace App\Models;

use PDO;

class ListAirport
{
    private PDO $connection;

    public string $masanbay;
    public string $tensanbay;
    public string $khuvuc;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all ListFlight from database
     *
     * @return ListAirport[]
     */

    public function all(): array
    {
        $listairports = [];

        $sql = 'SELECT * FROM sanbay';

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        while ($row = $statement->fetch()) {
            $listairport = new ListAirport($this->connection);
            $listairport->fromDbRow($row);
            $listairports[] = $listairport;
        }

        return $listairports;
    }

    private function fromDbRow(array $row): void
    {
        $this->masanbay = $row['MaSanBay'];
        $this->tensanbay = $row['TenSanBay'];
        $this->khuvuc = $row['KhuVuc'];
    }

    public function fill(array $data): ListAirport
    {
        $this->masanbay = $data['masanbay'];
        $this->tensanbay = $data['tensanbay'];
        $this->khuvuc = $data['khuvuc'];
        return $this;
    }

    public function add(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO sanbay (masanbay, tensanbay, khuvuc)
            VALUES (:masanbay, :tensanbay, :khuvuc)
        SQL);
        $statement->execute([
            'masanbay' => $this->masanbay,
            'tensanbay' => $this->tensanbay,
            'khuvuc' => $this->khuvuc,
        ]);
        if ($statement->rowCount() === 1) {
            $this->masanbay = (int)$this->connection->lastInsertId();
        }
        return $statement->rowCount() === 1;
    }

    public function findById($masanbay): ?ListAirport
    {
        $statement = $this->connection->prepare('SELECT * FROM sanbay WHERE masanbay = :masanbay');
        $statement->execute(['masanbay' => $masanbay]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $listairport = new ListAirport($this->connection);
        $listairport->fromDbRow($row);
        return $listairport;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE sanbay
            SET               
                tensanbay = :tensanbay,
                khuvuc = :khuvuc
            WHERE masanbay = :masanbay
            SQL);
        $statement->execute([
            'masanbay' => $this->masanbay,
            'tensanbay' => $this->tensanbay,
            'khuvuc' => $this->khuvuc,
        ]);
        return $statement->rowCount() === 1;
    }

    public function delete($masanbay): bool
    {
        $statement = $this->connection->prepare('DELETE FROM sanbay WHERE masanbay = :masanbay');
        $statement->execute(['masanbay' => $masanbay]);
        return $statement->rowCount() === 1;
    }
}
