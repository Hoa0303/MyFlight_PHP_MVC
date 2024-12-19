<?php

namespace App\Controllers;

class OrderController
{
    // public function index()
    // {
    //     try {
    //         include SRC_DIR . '/db_connect.php';
    //         $OrderModel = new \App\Models\Order($connection);
    //         $Orders = $OrderModel->all();
    //         require VIEWS_DIR . '/admin/listOrder.php';
    //     } catch (\PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }

    public function create()
    {
        include SRC_DIR . '/db_connect.php';
        $statusModel = new \App\Models\Status($connection);
        $statuses = $statusModel->all();
        // $OrderModel = new \App\Models\Order($connection);
        // $listOrder = $OrderModel->getMaLoai();
        // $listroute = $OrderModel->getMaTuyen();
        require VIEWS_DIR . '/admin/addorder.php';
    }

    // public function store()
    // {
    //     try {
    //         include SRC_DIR . '/db_connect.php';

    //         $OrderModel = new \App\Models\Order($connection);
    //         $OrderModel->fill([
    //             ...$_POST
    //         ])->add();

    //         $_SESSION['flash_message'] = 'Đã thêm vé thành công.';

    //         redirect('/listOrder');
    //     } catch (\PDOException $e) {
    //         // $_SESSION['false_message'] = 'Thông tin vé đã nhập không hợp lệ.';
    //         // redirect('/listOrder');
    //         echo $e->getMessage();
    //     }
    // }

    // public function edit($madatve)
    // {
    //     try {
    //         include SRC_DIR . '/db_connect.php';
    //         $OrderModel = new \App\Models\Order($connection);
    //         $listOrder = $OrderModel->getMaLoai();
    //         $listroute = $OrderModel->getMaTuyen();
    //         $Order = $OrderModel->findById($madatve);
    //         if (!$Order) {
    //             redirect('/admin');
    //         }

    //         require VIEWS_DIR . '/admin/editOrder.php';
    //     } catch (\PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }

    // public function update()
    // {
    //     try {
    //         include SRC_DIR .  '/db_connect.php';

    //         $OrderModel = new \App\Models\Order($connection);
    //         $OrderModel->fill([
    //             ...$_POST
    //         ])->save();

    //         $_SESSION['flash_message'] = 'Đã cập nhật vé thành công.';

    //         redirect('/listOrder');
    //     } catch (\PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }

    // public function destroy($mave)
    // {
    //     try {
    //         include SRC_DIR . '/db_connect.php';

    //         $OrderModel = new \App\Models\Order($connection);
    //         $Order = $OrderModel->findById($mave);

    //         $Order->delete();

    //         $_SESSION['flash_message'] = 'Đã xóa vé thành công.';

    //         redirect('/listOrder');
    //     } catch (\PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
}
