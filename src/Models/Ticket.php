<?php

namespace App\Models;

use PDO;

class Ticket
{
    private PDO $connection;

    public string $mave;
    public string $matuyen;
    public string $maloai;
    public string $madatve;
    public string $chongoi;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all ticket from database
     *
     * @return Ticket[]
     */

    public function all(): array
    {
        $tickets = [];

        $statement = $this->connection->prepare('SELECT * FROM ve WHERE madatve is null');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $ticket = new Ticket($this->connection);
            $ticket->fromDbRow($row);
            $tickets[] = $ticket;
        }

        return $tickets;
    }

    private function fromDbRow(array $row): void
    {
        $this->mave = $row['MaVe'];
        $this->matuyen = $row['MaTuyen'];
        $this->maloai = $row['MaLoai'];
        $this->chongoi = $row['ChoNgoi'];
    }


    public function findById($mave): ?Ticket
    {
        $statement = $this->connection->prepare('SELECT * FROM ve WHERE mave = :mave');
        $statement->execute(['mave' => $mave]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $profile = new Ticket($this->connection);
        $profile->fromDbRow($row);
        return $profile;
    }

    public function add(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO ve (mave, matuyen, maloai, chongoi)
            VALUES (:mave, :matuyen, :maloai, :chongoi)
        SQL);
        $statement->execute([
            'mave' => $this->mave,
            'matuyen' => $this->matuyen,
            'maloai' => $this->maloai,
            'chongoi' => $this->chongoi,
        ]);
        if ($statement->rowCount() === 1) {
            $this->mave = (int)$this->connection->lastInsertId();
        }
        return $statement->rowCount() === 1;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE ve
            SET
                matuyen = :matuyen,
                maloai = :maloai,
                chongoi = :chongoi
            WHERE mave = :mave
            SQL);
        $statement->execute([
            'matuyen' => $this->matuyen,
            'maloai' => $this->maloai,
            'chongoi' => $this->chongoi,
            'mave' => $this->mave,
        ]);
        return $statement->rowCount() === 1;
    }

    public function fill(array $data): Ticket
    {
        if (isset($data['mave'])) {
            $this->mave = $data['mave'];
        }
        $this->matuyen = $data['matuyen'];
        $this->maloai = $data['maloai'];
        $this->chongoi = $data['chongoi'];
        return $this;
    }

    public function delete(): bool
    {
        if ($this->mave === -1) {
            return false;
        }
        $statement = $this->connection->prepare('DELETE FROM ve WHERE mave = :mave');
        $statement->execute(['mave' => $this->mave]);
        return $statement->rowCount() === 1;
    }

    public function getMaLoai()
    {
        $sql = "SELECT MaLoai FROM loaive";

        $result = $this->connection->prepare($sql);
        $result->execute();
        $maloai = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $maloai[] = $row;
            }
        }
        return $maloai;
    }

    public function getMaTuyen()
    {
        $sql = "SELECT MaTuyen FROM tuyen";

        $result = $this->connection->prepare($sql);
        $result->execute();
        $matuyen = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $matuyen[] = $row;
            }
        }
        return $matuyen;
    }
}
