<?php

namespace App\Models;

use PDO;

class Status
{
    private PDO $connection;

    public string $mave;
    public string $matuyen;
    public string $maloai;
    public string $madatve;
    public string $chongoi;

    public string $id;
    public string $ngaydatve;
    public string $trangthai;
    public $check = false;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all ticket from database
     *
     * @return Status[]
     */

    public function all(): array
    {
        $statuses = [];

        $statement = $this->connection->prepare('SELECT * FROM ve v, datve dv WHERE v.madatve = dv.madatve AND v.madatve is not null');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $status = new Status($this->connection);
            $status->fromDbRow($row);
            $statuses[] = $status;
        }

        return $statuses;
    }

    private function fromDbRow(array $row): void
    {
        $this->mave = $row['MaVe'];
        $this->matuyen = $row['MaTuyen'];
        $this->maloai = $row['MaLoai'];
        $this->chongoi = $row['ChoNgoi'];

        $this->madatve = $row['MaDatVe'];
        $this->id = $row['ID'];
        $this->ngaydatve = $row['NgayDatVe'];
        $this->trangthai = $row['TrangThai'];
        if ($this->trangthai == 'Đã duyệt') {
            $this->check = true;
        }
    }
}
