<?php

namespace App\Controllers;

class FlightController
{
    public function search()
    {
        include SRC_DIR . '/db_connect.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $departurePoint = $_POST['Departurepoint']; // Điểm khởi hành
            $destination = $_POST['Destination']; // Điểm đến
            $passengers = $_POST['Passengers']; // Số lượng hàng khách
            $departureDate = $_POST['Departuredate']; // Ngày đi

            $flightModel = new \App\Models\Flight($connection);

            // Lưu các tuyến đi còn vé trống lên bảng tìm vé
            $tuyenDi = $flightModel->searchTuyen($departurePoint, $destination, $departureDate, $passengers);
            $_SESSION['allTuyenDi'] = $tuyenDi;

            // Kiểm tra người mua có lựa chọn ngày về
            if (isset($_POST['Returndate'])) {
                $returnDate = $_POST['Returndate'];

                // Lưu các tuyến về còn vé trống lên bảng tìm vé
                $tuyenVe = $flightModel->searchTuyen($destination, $departurePoint, $returnDate, $passengers);
                $_SESSION['allTuyenVe'] = $tuyenVe;
            } else {
                $returnDate = '';
            }

            if (isset($tuyenDi)) {
                include VIEWS_DIR . '/user/searchticket.php';
            }
        }
    }

    public function checkout()
    {
        include SRC_DIR . '/db_connect.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Tạo session lưu giá trị số lượng hàng khách
            $_SESSION['passenger'] = $_POST['passenger'];

            $maTuyendi = $_POST['id_tuyendi'];
            $loaive_tuyendi = $_POST['loaive_tuyendi'];

            $flightModel = new \App\Models\Flight($connection);
            // Lưu tuyến đi người mua đã chọn từ trang searchticket.php
            $tuyenDi = $flightModel->checkTuyen($maTuyendi, $loaive_tuyendi);
            $_SESSION['tuyendi'] = $tuyenDi;

            // Lưu các danh sách ghế ngồi còn trống của tuyến đi
            $gheTuyenDi = $flightModel->checkGhe($maTuyendi, $loaive_tuyendi);
            $_SESSION['gheTuyenDi'] = $gheTuyenDi;

            // Tiến hành kiểm tra người mua có lựa chọn vé cho chiều về không
            if (isset($_POST['id_tuyenve'])) {
                $maTuyenve = $_POST['id_tuyenve'];
                $loaive_tuyenve = $_POST['loaive_tuyenve'];

                // Lưu tuyến về người mua đã chọn từ trang searchticket.php
                $tuyenVe = $flightModel->checkTuyen($maTuyenve, $loaive_tuyenve);
                $_SESSION['tuyenve'] = $tuyenVe;

                // Lưu các danh sách ghế ngồi còn trống của tuyến về
                $gheTuyenVe = $flightModel->checkGhe($maTuyenve, $loaive_tuyenve);
                $_SESSION['gheTuyenVe'] = $gheTuyenVe;
            } else {
                $maTuyenve = '';
                $loaive_tuyenve = '';
            }
        }
        require VIEWS_DIR . '/user/checkout.php';
    }

    public function confirm()
    {
        include SRC_DIR . '/db_connect.php';
        $flightModel = new \App\Models\Flight($connection);
        $id = $_POST['id'];
        $tuyendi = $_POST['tuyendi'];
        $chuyendi = $flightModel->themMaDatVe($id, $tuyendi);
        if (($_POST['tuyenve']) != '') {
            $tuyenve = $_POST['tuyenve'];
            $chuyenve = $flightModel->themMaDatVe($id, $tuyenve);
        }

        for ($i = 1; $i <= $_SESSION['passenger']; $i++) {
            $selectedOption1 = $_POST["TD_$i"];
            if ($selectedOption1 == 'Chọn ghế') {
                $flightModel->xoaMaDatVe($id, $tuyendi);
                if (isset($tuyenve)) {
                    $flightModel->xoaMaDatVe($id, $tuyenve);
                }
                $_SESSION['mess'] = 'Vui lòng chọn ghế ngồi!';
                require VIEWS_DIR . '/user/checkout.php';
                break;
            }
            $datVeDi = $flightModel->datVe($id, $tuyendi, $selectedOption1);

            if (isset($tuyenve)) {
                $selectedOption2 = $_POST["TV_$i"];
                $datVeVe = $flightModel->datVe($id, $tuyenve, $selectedOption2);
            }
            require VIEWS_DIR . '/user/succsess.php';
        }
    }

    public function ticket()
    {
        include SRC_DIR . '/db_connect.php';
        $flightModel = new \App\Models\Flight($connection);
        $id = $_SESSION['id'];
        $myTicket = $flightModel->myTicket($id);
        $_SESSION['myTicket'] = $myTicket;

        $profileModel = new \App\Models\Profile($connection);
        $lists = $profileModel->findById($id);

        require VIEWS_DIR . '/user/mycart.php';
    }
}
