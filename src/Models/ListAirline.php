<?php

namespace App\Models;

use PDO;

class ListAirline
{
    private PDO $connection;

    public string $mahang;
    public string $tenhang;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all ListFlight from database
     *
     * @return ListAirline[]
     */

    public function all(): array
    {
        $listairlines = [];

        $sql = 'SELECT * FROM hanghangkhong';

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        while ($row = $statement->fetch()) {
            $listairline = new ListAirline($this->connection);
            $listairline->fromDbRow($row);
            $listairlines[] = $listairline;
        }

        return $listairlines;
    }

    private function fromDbRow(array $row): void
    {
        $this->mahang = $row['MaHang'];
        $this->tenhang = $row['TenHang'];
    }

    public function fill(array $data): ListAirline
    {
        $this->mahang = $data['mahang'];
        $this->tenhang = $data['tenhang'];
        return $this;
    }

    public function add(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO hanghangkhong (mahang, tenhang)
            VALUES (:mahang, :tenhang)
        SQL);
        $statement->execute([
            'mahang' => $this->mahang,
            'tenhang' => $this->tenhang,
        ]);
        if ($statement->rowCount() === 1) {
            $this->mahang = (int)$this->connection->lastInsertId();
        }
        return $statement->rowCount() === 1;
    }

    public function findById($mahang): ?ListAirline
    {
        $statement = $this->connection->prepare('SELECT * FROM hanghangkhong WHERE mahang = :mahang');
        $statement->execute(['mahang' => $mahang]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $listairline = new ListAirline($this->connection);
        $listairline->fromDbRow($row);
        return $listairline;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE hanghangkhong
            SET               
                tenhang = :tenhang
            WHERE mahang = :mahang
            SQL);
        $statement->execute([
            'mahang' => $this->mahang,
            'tenhang' => $this->tenhang,
        ]);
        return $statement->rowCount() === 1;
    }

    public function delete($mahang): bool
    {
        $statement = $this->connection->prepare('DELETE FROM hanghangkhong WHERE mahang = :mahang');
        $statement->execute(['mahang' => $mahang]);
        return $statement->rowCount() === 1;
    }
}
