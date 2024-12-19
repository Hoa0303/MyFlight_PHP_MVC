<?php

namespace App\Models;

use PDO;

class ListRoute
{
    private PDO $connection;

    public string $matuyen;
    public string $matuyenbay;
    public string $ngaykhoihanh;
    public string $giokhoihanh;
    public string $gioden;
    public string $mahang;
    public string $sohieu;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all ListRoute from database
     *
     * @return ListRoute[]
     */

    public function all(): array
    {
        $routes = [];

        $statement = $this->connection->prepare('SELECT * FROM tuyen');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $route = new ListRoute($this->connection);
            $route->fromDbRow($row);
            $routes[] = $route;
        }

        return $routes;
    }

    private function fromDbRow(array $row): void
    {
        $this->matuyen = $row['MaTuyen'];
        $this->matuyenbay = $row['MaTuyenBay'];
        $this->ngaykhoihanh = $row['NgayKhoiHanh'];
        $this->giokhoihanh = $row['GioKhoiHanh'];
        $this->gioden = $row['GioDen'];
        $this->mahang = $row['MaHang'];
        $this->sohieu = $row['SoHieu'];
    }


    public function findById($matuyen): ?ListRoute
    {
        $statement = $this->connection->prepare('SELECT * FROM tuyen WHERE matuyen = :matuyen');
        $statement->execute(['matuyen' => $matuyen]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $route = new ListRoute($this->connection);
        $route->fromDbRow($row);
        return $route;
    }

    public function add(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO tuyen (matuyen, matuyenbay, ngaykhoihanh, giokhoihanh, gioden, mahang, sohieu)
            VALUES (:matuyen, :matuyenbay, :ngaykhoihanh, :giokhoihanh, :gioden, :mahang, :sohieu)
        SQL);
        $statement->execute([
            'matuyenbay' => $this->matuyenbay,
            'ngaykhoihanh' => $this->ngaykhoihanh,
            'giokhoihanh' => $this->giokhoihanh,
            'gioden' => $this->gioden,
            'mahang' => $this->mahang,
            'sohieu' => $this->sohieu,
            'matuyen' => $this->matuyen,
        ]);
        if ($statement->rowCount() === 1) {
            $this->matuyen = (int)$this->connection->lastInsertId();
        }
        return $statement->rowCount() === 1;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE tuyen
            SET
                matuyenbay = :matuyenbay,
                ngaykhoihanh = :ngaykhoihanh,
                giokhoihanh = :giokhoihanh,
                gioden = :gioden,
                mahang = :mahang,
                sohieu = :sohieu
            WHERE matuyen = :matuyen
            SQL);
        $statement->execute([
            'matuyenbay' => $this->matuyenbay,
            'ngaykhoihanh' => $this->ngaykhoihanh,
            'giokhoihanh' => $this->giokhoihanh,
            'gioden' => $this->gioden,
            'mahang' => $this->mahang,
            'sohieu' => $this->sohieu,
            'matuyen' => $this->matuyen,
        ]);
        return $statement->rowCount() === 1;
    }

    public function fill(array $data): ListRoute
    {
        $this->matuyenbay = $data['matuyenbay'];
        $this->ngaykhoihanh = $data['ngaykhoihanh'];
        $this->giokhoihanh = $data['giokhoihanh'];
        $this->gioden = $data['gioden'];
        $this->mahang = $data['mahang'];
        $this->sohieu = $data['sohieu'];
        $this->matuyen = $data['matuyen'];
        return $this;
    }

    public function delete(): bool
    {
        if ($this->matuyen === -1) {
            return false;
        }
        $statement = $this->connection->prepare('DELETE FROM tuyen WHERE matuyen = :matuyen');
        $statement->execute(['matuyen' => $this->matuyen]);
        return $statement->rowCount() === 1;
    }

    public function getMaTuyen()
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

    public function getMaHang()
    {
        $sql = "SELECT MaHang FROM hanghangkhong";

        $result = $this->connection->prepare($sql);
        $result->execute();
        $mahang = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $mahang[] = $row;
            }
        }
        return $mahang;
    }

    public function getSoHieu($mahang)
    {
        $sql = "SELECT SoHieu FROM maybay WHERE MaHang = :mahang";

        $result = $this->connection->prepare($sql);
        $result->execute(['mahang' => $mahang]);
        $sohieu = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $sohieu[] = $row;
            }
        }
        return $sohieu;
    }
}
