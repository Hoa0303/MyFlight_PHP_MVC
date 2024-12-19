<?php

namespace App\Controllers;

class ListPlaneController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listplaneModel = new \App\Models\ListPlane($connection);
            $lists = $listplaneModel->all();
            require VIEWS_DIR . '/admin/listplane.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        require VIEWS_DIR . '/admin/addplane.php';
    }

    public function store()
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listplaneModel = new \App\Models\ListPlane($connection);
            $listplaneModel->fill([
                ...$_POST
            ])->add();

            $_SESSION['flash_message'] = 'Đã thêm máy bay thành công.';

            redirect('/listplane');
        } catch (\PDOException $e) {
            $_SESSION['false_message'] = 'Thông tin máy bay đã nhập không hợp lệ.';
            redirect('/listplane');
        }
    }

    public function edit($sohieu)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listplaneModel = new \App\Models\ListPlane($connection);
            $list = $listplaneModel->findById($sohieu);
            if (!$list) {
                redirect('/admin');
            }

            require VIEWS_DIR . '/admin/editplane.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $listplaneModel = new \App\Models\ListPlane($connection);
            $listplaneModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật máy bay thành công.';

            redirect('/listplane');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($sohieu)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listplaneModel = new \App\Models\ListPlane($connection);
            $listplaneModel->delete($sohieu);

            $_SESSION['flash_message'] = 'Đã xóa máy bay thành công.';

            redirect('/listplane');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
