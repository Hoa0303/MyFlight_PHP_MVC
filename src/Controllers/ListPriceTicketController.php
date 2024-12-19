<?php

namespace App\Controllers;

class ListPriceTicketController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listpriceticketModel = new \App\Models\ListPriceTicket($connection);
            $lists = $listpriceticketModel->all();
            require VIEWS_DIR . '/admin/listpriceticket.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        require VIEWS_DIR . '/admin/addpriceticket.php';
    }

    public function store()
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listpriceticketModel = new \App\Models\ListPriceTicket($connection);
            $listpriceticketModel->fill([
                ...$_POST
            ])->add();

            $_SESSION['flash_message'] = 'Đã thêm loại vé thành công.';

            redirect('/priceticket');
        } catch (\PDOException $e) {
            $_SESSION['false_message'] = 'Thông tin loại vé đã nhập không hợp lệ.';
            redirect('/priceticket');
        }
    }

    public function edit($maloai)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $listpriceticketModel = new \App\Models\ListPriceTicket($connection);
            $list = $listpriceticketModel->findById($maloai);
            if (!$list) {
                redirect('/admin');
            }

            require VIEWS_DIR . '/admin/editpriceticket.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $listpriceticketModel = new \App\Models\ListPriceTicket($connection);
            $listpriceticketModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật loại vé thành công.';

            redirect('/priceticket');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($maloai)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $listpriceticketModel = new \App\Models\ListPriceTicket($connection);
            $priceticket = $listpriceticketModel->findById($maloai);

            $priceticket->delete();

            $_SESSION['flash_message'] = 'Đã xóa loại vé thành công.';

            redirect('/priceticket');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
