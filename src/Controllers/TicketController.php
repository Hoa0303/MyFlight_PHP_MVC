<?php

namespace App\Controllers;

class TicketController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $ticketModel = new \App\Models\Ticket($connection);
            $tickets = $ticketModel->all();
            require VIEWS_DIR . '/admin/listticket.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {
        include SRC_DIR . '/db_connect.php';
        $ticketModel = new \App\Models\Ticket($connection);
        $listticket = $ticketModel->getMaLoai();
        $listroute = $ticketModel->getMaTuyen();
        require VIEWS_DIR . '/admin/addticket.php';
    }

    public function store()
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $ticketModel = new \App\Models\Ticket($connection);
            $ticketModel->fill([
                ...$_POST
            ])->add();

            $_SESSION['flash_message'] = 'Đã thêm vé thành công.';

            redirect('/listticket');
        } catch (\PDOException $e) {
            // $_SESSION['false_message'] = 'Thông tin vé đã nhập không hợp lệ.';
            // redirect('/listticket');
            echo $e->getMessage();
        }
    }

    public function edit($madatve)
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $ticketModel = new \App\Models\Ticket($connection);
            $listticket = $ticketModel->getMaLoai();
            $listroute = $ticketModel->getMaTuyen();
            $ticket = $ticketModel->findById($madatve);
            if (!$ticket) {
                redirect('/admin');
            }

            require VIEWS_DIR . '/admin/editticket.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            include SRC_DIR .  '/db_connect.php';

            $ticketModel = new \App\Models\Ticket($connection);
            $ticketModel->fill([
                ...$_POST
            ])->save();

            $_SESSION['flash_message'] = 'Đã cập nhật vé thành công.';

            redirect('/listticket');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($mave)
    {
        try {
            include SRC_DIR . '/db_connect.php';

            $ticketModel = new \App\Models\Ticket($connection);
            $ticket = $ticketModel->findById($mave);

            $ticket->delete();

            $_SESSION['flash_message'] = 'Đã xóa vé thành công.';

            redirect('/listticket');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
