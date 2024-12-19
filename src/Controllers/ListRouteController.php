<?php

namespace App\Controllers;

class ListRouteController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listrouteModel = new \App\Models\ListRoute($connection);
            $routes = $listrouteModel->all();
            require VIEWS_DIR . '/admin/listroute.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        include SRC_DIR . '/db_connect.php';
        $listrouteModel = new \App\Models\ListRoute($connection);
        $listMaTuyenBay = $listrouteModel->getMaTuyen();
        $listMaHang = $listrouteModel->getMaHang();
        require VIEWS_DIR . '/admin/addroute.php';
    }

    public function getMaHang()
    {
        $mahang = $_POST["mahang"];
        include SRC_DIR . '/db_connect.php';
        $listrouteModel = new \App\Models\ListRoute($connection);
        $listMaHang = $listrouteModel->getSoHieu($mahang);
        echo json_encode($listMaHang);
    }

    public function store()
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listrouteModel = new \App\Models\ListRoute($connection);
            $listrouteModel->fill([
                ...$_POST
            ])->add();

            $_SESSION['flash_message'] = 'Đã thêm tuyến thành công.';

            redirect('/listroute');
        } catch (\PDOException $e) {
            $_SESSION['false_message'] = 'Thông tin vé đã nhập không hợp lệ.';
            redirect('/listroute');
        }
    }

    public function edit($madatve)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listrouteModel = new \App\Models\ListRoute($connection);
            $listMaTuyenBay = $listrouteModel->getMaTuyen();
            $listMaHang = $listrouteModel->getMaHang();
            $route = $listrouteModel->findById($madatve);
            if (!$route) {
                redirect('/admin');
            }

            require VIEWS_DIR . '/admin/editroute.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $listrouteModel = new \App\Models\ListRoute($connection);
            $listrouteModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật tuyến thành công.';

            redirect('/listroute');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($matuyen)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listrouteModel = new \App\Models\ListRoute($connection);
            $route = $listrouteModel->findById($matuyen);

            $route->delete();

            $_SESSION['flash_message'] = 'Đã xóa tuyến thành công.';

            redirect('/listroute');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
