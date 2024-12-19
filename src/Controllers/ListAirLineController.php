<?php

namespace App\Controllers;

class ListAirlineController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listairlineModel = new \App\Models\ListAirline($connection);
            $lists = $listairlineModel->all();
            require VIEWS_DIR . '/admin/listairline.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        require VIEWS_DIR . '/admin/addairline.php';
    }

    public function store()
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listairlineModel = new \App\Models\ListAirline($connection);
            $listairlineModel->fill([
                ...$_POST
            ])->add();

            $_SESSION['flash_message'] = 'Đã thêm hãng hàng không thành công.';

            redirect('/listairline');
        } catch (\PDOException $e) {
            $_SESSION['false_message'] = 'Thông tin hãng hàng không đã nhập không hợp lệ.';
            redirect('/listairline');
        }
    }

    public function edit($mahang)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listairlineModel = new \App\Models\ListAirline($connection);
            $list = $listairlineModel->findById($mahang);
            if (!$list) {
                redirect('/admin');
            }

            require VIEWS_DIR . '/admin/editairline.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $listairlineModel = new \App\Models\ListAirline($connection);
            $listairlineModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật hãng hàng không thành công.';

            redirect('/listairline');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($mahang)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listairlineModel = new \App\Models\ListAirline($connection);
            $listairlineModel->delete($mahang);

            $_SESSION['flash_message'] = 'Đã xóa hãng hàng không thành công.';

            redirect('/listairline');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
