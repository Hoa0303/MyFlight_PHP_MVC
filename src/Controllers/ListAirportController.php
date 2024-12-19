<?php

namespace App\Controllers;

class ListAirportController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listairportModel = new \App\Models\ListAirport($connection);
            $lists = $listairportModel->all();
            require VIEWS_DIR . '/admin/listairport.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        require VIEWS_DIR . '/admin/addairport.php';
    }

    public function store()
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listairportModel = new \App\Models\ListAirport($connection);
            $listairportModel->fill([
                ...$_POST
            ])->add();

            $_SESSION['flash_message'] = 'Đã thêm sân bay thành công.';

            redirect('/listairport');
        } catch (\PDOException $e) {
            $_SESSION['false_message'] = 'Thông tin sân bay đã nhập không hợp lệ.';
            redirect('/listairport');
        }
    }

    public function edit($madatve)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listairportModel = new \App\Models\ListAirport($connection);
            $list = $listairportModel->findById($madatve);
            if (!$list) {
                redirect('/admin');
            }

            require VIEWS_DIR . '/admin/editairport.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $listairportModel = new \App\Models\ListAirport($connection);
            $listairportModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật sân bay thành công.';

            redirect('/listairport');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($masanbay)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listairportModel = new \App\Models\ListAirport($connection);
            $listairportModel->delete($masanbay);

            $_SESSION['flash_message'] = 'Đã xóa sân bay thành công.';

            redirect('/listairport');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
