<?php

namespace App\Models;

use PDO;

class ListFlight
{
    private PDO $connection;

    public string $matuyenbay;
    public string $masanbaydi;
    public string $masanbayden;
    public string $tensanbaydi;
    public string $tensanbayden;
    public string $khuvucdi;
    public string $khuvucden;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all ListFlight from database
     *
     * @return ListFlight[]
     */

    public function all(): array
    {
        $listflights = [];

        $sql = 'SELECT tb.MaTuyenBay, 
                    sbdi.MaSanBay AS MaSanBayDi, sbdi.TenSanBay AS TenSanBayDi, sbdi.KhuVuc AS KhuVucDi,
                    sbden.MaSanBay AS MaSanBayDen, sbden.TenSanBay AS TenSanBayDen, sbden.KhuVuc AS KhuVucDen
                FROM tuyenbay tb
                INNER JOIN sanbay sbdi ON tb.SanBayDi = sbdi.MaSanBay
                INNER JOIN sanbay sbden ON tb.SanBayDen = sbden.MaSanBay;';

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        while ($row = $statement->fetch()) {
            $listflight = new ListFlight($this->connection);
            $listflight->fromDbRow($row);
            $listflights[] = $listflight;
        }

        return $listflights;
    }

    private function fromDbRow(array $row): void
    {
        $this->matuyenbay = $row['MaTuyenBay'];
        $this->masanbaydi = $row['MaSanBayDi'];
        $this->masanbayden = $row['MaSanBayDen'];
        $this->tensanbaydi = $row['TenSanBayDi'];
        $this->tensanbayden = $row['TenSanBayDen'];
        $this->khuvucdi = $row['KhuVucDi'];
        $this->khuvucden = $row['KhuVucDen'];
    }

    public function fill(array $data): ListFlight
    {
        $this->matuyenbay = $data['matuyenbay'];
        $this->masanbaydi = $data['sanbaydi'];
        $this->masanbayden = $data['sanbayden'];
        return $this;
    }

    public function add(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO tuyenbay (matuyenbay, sanbaydi, sanbayden)
            VALUES (:matuyenbay, :sanbaydi, :sanbayden)
        SQL);
        $statement->execute([
            'matuyenbay' => $this->matuyenbay,
            'sanbaydi' => $this->masanbaydi,
            'sanbayden' => $this->masanbayden,
        ]);
        if ($statement->rowCount() === 1) {
            $this->matuyenbay = (int)$this->connection->lastInsertId();
        }
        return $statement->rowCount() === 1;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE tuyenbay
            SET
                sanbaydi = :sanbaydi,
                sanbayden = :sanbayden
            WHERE matuyenbay = :matuyenbay
            SQL);
        $statement->execute([
            'matuyenbay' => $this->matuyenbay,
            'sanbaydi' => $this->masanbaydi,
            'sanbayden' => $this->masanbayden,
        ]);
        
        return $statement->rowCount() === 1;
    }

    public function findById($matuyenbay): ?ListFlight
    {
        $sql = 'SELECT tb.MaTuyenBay, 
                    sbdi.MaSanBay AS MaSanBayDi, sbdi.TenSanBay AS TenSanBayDi, sbdi.KhuVuc AS KhuVucDi,
                    sbden.MaSanBay AS MaSanBayDen, sbden.TenSanBay AS TenSanBayDen, sbden.KhuVuc AS KhuVucDen
                FROM tuyenbay tb
                INNER JOIN sanbay sbdi ON tb.SanBayDi = sbdi.MaSanBay
                INNER JOIN sanbay sbden ON tb.SanBayDen = sbden.MaSanBay
                WHERE matuyenbay = :matuyenbay;';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['matuyenbay' => $matuyenbay]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $listflight = new ListFlight($this->connection);
        $listflight->fromDbRow($row);
        return $listflight;
    }

    public function delete($matuyenbay): bool
    {
        $statement = $this->connection->prepare('DELETE FROM tuyenbay WHERE matuyenbay = :matuyenbay');
        $statement->execute(['matuyenbay' => $matuyenbay]);
        return $statement->rowCount() === 1;
    }

    public function getSanBay()
    {
        $sql = "SELECT MaSanBay FROM sanbay";

        $result = $this->connection->prepare($sql);
        $result->execute();
        $sanbay = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $sanbay[] = $row;
            }
        }
        return $sanbay;
    }
}
