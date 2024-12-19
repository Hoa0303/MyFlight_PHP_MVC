<?php

namespace App\Controllers;

class NavController
{
    public function index()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            require VIEWS_DIR . '/user/home.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function admin_login()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            require VIEWS_DIR . '/auth/admin_login.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function admin()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            require VIEWS_DIR . '/admin/index.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function flight()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            require VIEWS_DIR . '/user/flight.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function new()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            require VIEWS_DIR . '/user/new.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function guidance()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            require VIEWS_DIR . '/user/guidance.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function contact()
    {
        try {
            include SRC_DIR . '/db_connect.php';
            require VIEWS_DIR . '/user/contact.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
