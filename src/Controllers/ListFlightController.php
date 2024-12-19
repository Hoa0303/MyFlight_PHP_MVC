<?php

namespace App\Controllers;

class ListFlightController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listflightModel = new \App\Models\ListFlight($connection);
            $lists = $listflightModel->all();
            require VIEWS_DIR . '/admin/listflight.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        include SRC_DIR . '/db_connect.php';
        $listflightModel = new \App\Models\ListFlight($connection);
        $listSanBay = $listflightModel->getSanBay();
        require VIEWS_DIR . '/admin/addflight.php';
    }

    public function store()
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listflightModel = new \App\Models\ListFlight($connection);
            $listflightModel->fill([
                ...$_POST
            ])->add();

            $_SESSION['flash_message'] = 'Đã thêm tuyến thành công.';

            redirect('/listflight');
        } catch (\PDOException $e) {
            $_SESSION['false_message'] = 'Thông tin tuyến đã nhập không hợp lệ.';
            redirect('/listflight');
        }
    }

    public function edit($matuyenbay)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listflightModel = new \App\Models\ListFlight($connection);
            $listSanBay = $listflightModel->getSanBay();
            $route = $listflightModel->findById($matuyenbay);
            if (!$route) {
                redirect('/admin');
            }

            require VIEWS_DIR . '/admin/editflight.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $listflightModel = new \App\Models\ListFlight($connection);
            $listflightModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật tuyến bay thành công.';

            redirect('/listflight');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($matuyenbay)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listflightModel = new \App\Models\ListFlight($connection);
            $listflightModel->delete($matuyenbay);

            $_SESSION['flash_message'] = 'Đã xóa tuyến bay thành công.';

            redirect('/listflight');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
