<?php

namespace App\Controllers;

class AuthController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            require VIEWS_DIR . '/user/home.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login()
    {
        include SRC_DIR . '/db_connect.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['pass'];

            $userModel = new \App\Models\User($connection);
            $checkrole = $userModel->isuser($username, $password);
        }
        if (isset($checkrole)) {
            if ($checkrole == 1)
                header('Location: /admin');
            else
                header('Location: /myprofile/'.$_SESSION['id']);
        } else {
            header('Location: /');
            echo '<script type="text/javascript">alert("Email hoặc mật khẩu không chính xác!");</script>';
        }
    }

    public function destroy()
    {
        unset($_SESSION['user_name']);
        session_destroy();
        header('Location: /');
    }

    public function register()
    {
        include SRC_DIR . '/db_connect.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $password = $_POST['pass'];

            $userModel = new \App\Models\User($connection);

            if ($userModel->create($email, $fullname, $phone, $password)) {
                // Đăng ký thành công, thực hiện định tuyến hoặc chuyển hướng.
                // echo "Đăng ký thành công!";
                header('Location: /');
                echo '<script type="text/javascript">alert(""Đăng ký thành công!!");</script>';
            } else {
                // Đăng ký thất bại, hiển thị thông báo hoặc chuyển hướng.
                // echo "Lỗi khi đăng ký tài khoản.";
                header('Location: /');
                echo '<script type="text/javascript">alert("Lỗi khi đăng ký tài khoản!");</script>';
            }
        }
    }
}
