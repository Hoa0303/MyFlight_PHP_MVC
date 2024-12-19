<?php

namespace App\Models;

use PDO;

class Profile
{
    private PDO $connection;

    public int $id;
    public string $email;
    public string $hoten;
    public string $phone;
    public string $cccd;
    public string $gioitinh;
    public string $ngaysinh;
    public string $diachi;


    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get all profiles from database
     *
     * @return Profile[]
     */
    public function all(): array
    {
        $profiles = [];

        $statement = $this->connection->prepare('SELECT * FROM user where role = 0');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $profile = new Profile($this->connection);
            $profile->fromDbRow($row);
            $profiles[] = $profile;
        }

        return $profiles;
    }

    private function fromDbRow(array $row): void
    {
        $this->id = $row['ID'] ?? null;
        $this->email = $row['Email'] ?? null;
        $this->hoten = $row['HoTen'] ?? null;
        $this->phone = $row['Phone'] ?? null;
        $this->cccd = $row['CCCD'] ?? '';
        $this->gioitinh = $row['GioiTinh'] ?? '';
        $this->ngaysinh = $row['NgaySinh'] ?? '';
        $this->diachi = $row['DiaChi'] ?? '';
    }

    public function findById(int $id): ?Profile
    {
        $statement = $this->connection->prepare('SELECT * FROM user WHERE id = :id');
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $profile = new Profile($this->connection);
        $profile->fromDbRow($row);
        return $profile;
    }

    public function save(): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            UPDATE user
            SET
                hoten = :hoten,
                gioitinh = :gioitinh,
                cccd = :cccd,
                diachi = :diachi,
                phone = :phone,
                ngaysinh = :ngaysinh
            WHERE id = :id
            SQL);
        $statement->execute([
            'hoten' => $this->hoten,
            'gioitinh' => $this->gioitinh,
            'cccd' => $this->cccd,
            'diachi' => $this->diachi,
            'phone' => $this->phone,
            'ngaysinh' => $this->ngaysinh,
            'id' => $this->id,
        ]);
        return $statement->rowCount() === 1;
    }

    public function fill(array $data): Profile
    {
        $this->id = $data['id'];
        $this->email = $data['email'];
        $this->hoten = $data['hoten'];
        $this->gioitinh = $data['gioitinh'];
        $this->cccd = $data['cccd'];
        $this->diachi = $data['diachi'];
        $this->phone = $data['phone'];
        $this->ngaysinh = $data['birthday'];
        return $this;
    }

    public function delete(): bool
    {
        if ($this->id === -1) {
            return false;
        }
        $statement = $this->connection->prepare('DELETE FROM user WHERE id = :id');
        $statement->execute(['id' => $this->id]);
        return $statement->rowCount() === 1;
    }
}
