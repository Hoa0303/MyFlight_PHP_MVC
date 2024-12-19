<?php

namespace App\Controllers;

class StatusController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            $statusModel = new \App\Models\Status($connection);
            $statuses = $statusModel->all();
            require VIEWS_DIR . '/admin/statusticket.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
            
    }

}
