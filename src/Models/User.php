<?php

namespace App\Models;

use PDO;

class User
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    public function isuser($username, $password)
    {
        $query = "SELECT * FROM user WHERE email = :username AND password = :password";
        $stmt = $this->connection->prepare($query);

        // $password = md5($password); // Thay đổi cách mã hóa mật khẩu tùy theo cấu hình cơ sở dữ liệu của bạn.

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        $user = $stmt->fetch();
        if ($user) {
            $_SESSION['user_name'] = $user['HoTen'];
            $_SESSION['id'] = $user['ID'];
            $role = $user['role'];
        }
        if (isset($role))
            return $role;
    }

    public function create($email, $fullname, $phone, $password)
    {
        $check = $this->connection->prepare("SELECT id FROM user WHERE email = '$email'");
        $check->execute();

        if ($check->rowCount() > 0) {
            return false;
        }

        // $password = md5($password); // Thay đổi cách mã hóa mật khẩu tùy theo cấu hình cơ sở dữ liệu của bạn.

        $query = "INSERT INTO user (email, hoten, phone, password) VALUES (?,?,?,?)";
        $stmt = $this->connection->prepare($query);

        if ($stmt->execute([$email, $fullname, $phone, $password])) {
            return true; // Đăng ký thành công
        } else {
            return false; // Lỗi khi thêm tài khoản vào cơ sở dữ liệu
        }
    }
}
