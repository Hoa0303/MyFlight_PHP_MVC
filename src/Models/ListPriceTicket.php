<?php

namespace App\Models;

use LimitIterator;
use PDO;

class ListPriceTicket
{
    private PDO $connection;

    public string $maloaive;
    public string $tenloaive;
    public string $gialoaive;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all ticket from database
     *
     * @return ListPriceTicket[]
     */

    public function all(): array
    {
        $listpricetickets = [];

        $statement = $this->connection->prepare('SELECT * FROM loaive');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $listpriceticket = new ListPriceTicket($this->connection);
            $listpriceticket->fromDbRow($row);
            $listpricetickets[] = $listpriceticket;
        }

        return $listpricetickets;
    }

    private function fromDbRow(array $row): void
    {
        $this->maloaive = $row['MaLoai'];
        $this->tenloaive = $row['TenLoai'];
        $this->gialoaive = $row['GiaLoaiVe'];
    }

    public function fill(array $data): ListPriceTicket
    {
        $this->maloaive = $data['maloai'];
        $this->tenloaive = $data['tenloai'];
        $this->gialoaive = $data['gialoai'];
        return $this;
    }

    public function add(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO loaive (maloai, tenloai, gialoaive)
            VALUES (:maloai, :tenloai, :gialoaive)
        SQL);
        $statement->execute([
            'maloai' => $this->maloaive,
            'tenloai' => $this->tenloaive,
            'gialoaive' => $this->gialoaive,
        ]);
        if ($statement->rowCount() === 1) {
            $this->maloaive = (int)$this->connection->lastInsertId();
        }
        return $statement->rowCount() === 1;
    }


    public function findById($maloaive): ?ListPriceTicket
    {
        $statement = $this->connection->prepare('SELECT * FROM loaive WHERE maloai = :maloai');
        $statement->execute(['maloai' => $maloaive]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $price = new ListPriceTicket($this->connection);
        $price->fromDbRow($row);
        return $price;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE loaive
            SET                
                tenloai = :tenloai,
                gialoaive = :gialoaive
            WHERE maloai = :maloai
            SQL);
        $statement->execute([
            'maloai' => $this->maloaive,
            'tenloai' => $this->tenloaive,
            'gialoaive' => $this->gialoaive,
        ]);
        return $statement->rowCount() === 1;
    }

    public function delete(): bool
    {
        if ($this->maloaive === -1) {
            return false;
        }
        $statement = $this->connection->prepare('DELETE FROM loaive WHERE maloai = :maloai');
        $statement->execute(['maloai' => $this->maloaive]);
        return $statement->rowCount() === 1;
    }
}
