<?php

namespace App\Controllers;

class ListPriceflightController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listpriceflightModel = new \App\Models\ListPriceflight($connection);
            $lists = $listpriceflightModel->all();
            require VIEWS_DIR . '/admin/listpriceflight.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        include SRC_DIR . '/db_connect.php';
        $listpriceflightModel = new \App\Models\ListPriceflight($connection);
        $listMaTuyen = $listpriceflightModel->getMaTuyenBay();
        require VIEWS_DIR . '/admin/addpriceflight.php';
    }

    public function store()
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listpriceflightModel = new \App\Models\ListPriceflight($connection);
            $listpriceflightModel->fill([
                ...$_POST
            ])->add();

            $_SESSION['flash_message'] = 'Đã thêm giá tuyến thành công.';

            redirect('/priceflight');
        } catch (\PDOException $e) {
            $_SESSION['false_message'] = 'Thông tin giá tuyến đã nhập không hợp lệ.';
            redirect('/priceflight');
        }
    }

    public function edit($magiatuyen)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listpriceflightModel = new \App\Models\ListPriceflight($connection);
            $listMaTuyen = $listpriceflightModel->getMaTuyenBay();
            $list = $listpriceflightModel->findById($magiatuyen);
            if (!$list) {
                redirect('/admin');
            }

            require VIEWS_DIR . '/admin/editpriceflight.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $listpriceflightModel = new \App\Models\ListPriceflight($connection);
            $listpriceflightModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật giá tuyến thành công.';

            redirect('/priceflight');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($magiatuyen)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listpriceflightModel = new \App\Models\ListPriceflight($connection);
            $priceflight = $listpriceflightModel->findById($magiatuyen);

            $priceflight->delete();

            $_SESSION['flash_message'] = 'Đã xóa giá tuyến thành công.';

            redirect('/priceflight');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
