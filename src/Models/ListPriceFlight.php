<?php

namespace App\Models;

use LimitIterator;
use PDO;

class ListPriceflight
{
    private PDO $connection;

    public string $magiatuyen;
    public string $tuyenbay;
    public string $giatuyen;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all flight from database
     *
     * @return ListPriceflight[]
     */

    public function all(): array
    {
        $listpriceflights = [];

        $statement = $this->connection->prepare('SELECT * FROM giatuyenbay');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $listpriceflight = new ListPriceflight($this->connection);
            $listpriceflight->fromDbRow($row);
            $listpriceflights[] = $listpriceflight;
        }

        return $listpriceflights;
    }

    private function fromDbRow(array $row): void
    {
        $this->magiatuyen = $row['MaGiaTuyenBay'];
        $this->tuyenbay = $row['MaTuyenBay'];
        $this->giatuyen = $row['GiaTuyen'];
    }

    public function fill(array $data): ListPriceflight
    {
        $this->magiatuyen = $data['magiatuyen'];
        $this->tuyenbay = $data['tuyenbay'];
        $this->giatuyen = $data['giatuyen'];
        return $this;
    }

    public function add(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO giatuyenbay (magiatuyenbay, matuyenbay, giatuyen)
            VALUES (:magiatuyen, :matuyenbay, :giatuyen)
        SQL);
        $statement->execute([
            'magiatuyen' => $this->magiatuyen,
            'matuyenbay' => $this->tuyenbay,
            'giatuyen' => $this->giatuyen,
        ]);
        if ($statement->rowCount() === 1) {
            $this->magiatuyen = (int)$this->connection->lastInsertId();
        }
        return $statement->rowCount() === 1;
    }


    public function findById($magiatuyen): ?ListPriceflight
    {
        $statement = $this->connection->prepare('SELECT * FROM giatuyenbay WHERE magiatuyenbay = :magiatuyenbay');
        $statement->execute(['magiatuyenbay' => $magiatuyen]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $price = new ListPriceflight($this->connection);
        $price->fromDbRow($row);
        return $price;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE giatuyenbay
            SET                
                matuyenbay = :matuyenbay,
                giatuyen = :giatuyen
            WHERE magiatuyenbay = :magiatuyenbay
            SQL);
        $statement->execute([
            'magiatuyenbay' => $this->magiatuyen,
            'matuyenbay' => $this->tuyenbay,
            'giatuyen' => $this->giatuyen,
        ]);
        return $statement->rowCount() === 1;
    }

    public function delete(): bool
    {
        if ($this->magiatuyen === -1) {
            return false;
        }
        $statement = $this->connection->prepare('DELETE FROM giatuyenbay WHERE magiatuyenbay = :magia');
        $statement->execute(['magia' => $this->magiatuyen]);
        return $statement->rowCount() === 1;
    }

    public function getMaTuyenBay()
    {
        $sql = "SELECT MaTuyenBay FROM tuyenbay";

        $result = $this->connection->prepare($sql);
        $result->execute();
        $matuyenbay = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $matuyenbay[] = $row;
            }
        }
        return $matuyenbay;
    }
}
