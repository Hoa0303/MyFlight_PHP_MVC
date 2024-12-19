<?php

namespace App\Models;

use PDO;

class Flight
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function searchTuyen($departurePoint, $destination, $departureDate, $passengers)
    {
        $sql = "SELECT Distinct
                t.MaTuyen,
                s1.tensanbay AS SanBayDi,
                s2.tensanbay AS SanBayDen,
                DAYOFWEEK(ngaykhoihanh) AS Thu,
                t.NgayKhoiHanh,
                t.GioKhoiHanh,
                t.GioDen,
                v.MaLoai,
                mb.SoHieu,
                hhk.TenHang,
                FORMAT((gtb.GiaTuyen + lv.GiaLoaiVe) * $passengers, 0) AS GiaVe
            FROM
                Ve v
                INNER JOIN tuyen t ON v.MaTuyen = t.MaTuyen
                INNER JOIN tuyenbay tb ON t.MaTuyenBay = tb.MaTuyenBay
                INNER JOIN sanbay s1 ON tb.SanBayDi = s1.MaSanBay
                INNER JOIN sanbay s2 ON tb.SanBayDen = s2.MaSanBay
                INNER JOIN GiaTuyenBay gtb ON tb.MaTuyenBay = gtb.MaTuyenBay
                INNER JOIN LoaiVe lv ON v.MaLoai = lv.MaLoai
                INNER JOIN maybay mb ON t.sohieu = mb.sohieu
                INNER JOIN hanghangkhong hhk on hhk.mahang = mb.mahang
            WHERE
                s1.khuvuc = '$departurePoint' AND s2.khuvuc = '$destination' AND NgayKhoiHanh = '$departureDate' AND v.MaDatVe is null;";

        $result = $this->connection->prepare($sql);
        $result->execute();
        $tuyen = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $tuyen[] = $row;
            }
        } else {
            $_SESSION['error'] = 'Không tìm thấy vé phù hợp!';
        }

        return $tuyen;
    }

    public function checkTuyen($MaTuyen, $MaLoai)
    {
        $sql = "SELECT Distinct
                t.MaTuyen,
                s1.tensanbay AS SanBayDi,
                s2.tensanbay AS SanBayDen,
                DAYOFWEEK(ngaykhoihanh) AS Thu,
                t.NgayKhoiHanh,
                t.GioKhoiHanh,
                t.GioDen,
                v.MaLoai,
                mb.SoHieu,
                hhk.TenHang,
                gtb.GiaTuyen,
                lv.GiaLoaiVe
            FROM
                Ve v
                INNER JOIN tuyen t ON v.MaTuyen = t.MaTuyen
                INNER JOIN tuyenbay tb ON t.MaTuyenBay = tb.MaTuyenBay
                INNER JOIN sanbay s1 ON tb.SanBayDi = s1.MaSanBay
                INNER JOIN sanbay s2 ON tb.SanBayDen = s2.MaSanBay
                INNER JOIN GiaTuyenBay gtb ON tb.MaTuyenBay = gtb.MaTuyenBay
                INNER JOIN LoaiVe lv ON v.MaLoai = lv.MaLoai
                INNER JOIN maybay mb ON t.sohieu = mb.sohieu
                INNER JOIN hanghangkhong hhk on hhk.mahang = mb.mahang
            WHERE
                    t.MaTuyen = '$MaTuyen' and v.MaLoai= '$MaLoai'";

        $result = $this->connection->prepare($sql);
        $result->execute();
        $tickets = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $tickets[] = $row;
            }
        }
        return $tickets;
    }

    public function checkGhe($MaTuyen, $MaLoai)
    {
        $sql = "SELECT chongoi
                FROM ve v, tuyen t
                Where v.MaTuyen = t.MaTuyen and T.MaTuyen = '$MaTuyen' and v.MaLoai= '$MaLoai' AND v.MaDatVe is null
                order by CAST(SUBSTRING(chongoi, 2) AS SIGNED)";

        $ketqua = $this->connection->prepare($sql);
        $ketqua->execute();
        $listchongoi = array();

        if ($ketqua->rowCount() > 0) {
            while ($row = $ketqua->fetch()) {
                $listchongoi[] = $row;
            }
        }
        return $listchongoi;
    }

    public function themMaDatVe($ID, $MaTuyen): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            INSERT INTO datve (madatve,id, matuyen, ngaydatve)
            VALUES (uuid(), :id, :matuyen, NOW())
        SQL);

        $statement->execute([
            'id' => $ID,
            'matuyen' => $MaTuyen
        ]);

        return true;
    }

    public function xoaMaDatVe($ID, $MaTuyen): bool
    {
        $statement = $this->connection->prepare(<<<SQL
            DELETE FROM datve
            WHERE id = :id AND matuyen = :matuyen 
        SQL);

        $statement->execute([
            'id' => $ID,
            'matuyen' => $MaTuyen
        ]);

        return true;
    }

    public function datVe($ID, $MaTuyen, $ChoNgoi)
    {
        $smt = $this->connection->prepare(<<<SQL
            UPDATE ve
            SET madatve = (SELECT madatve FROM datve WHERE id = '$ID' and matuyen = '$MaTuyen')
            WHERE madatve is null and chongoi = '$ChoNgoi';
        SQL);
        $smt->execute();

        $sql = $this->connection->prepare(<<<SQL
            UPDATE maybay
            SET soghe = soghe -1
            WHERE sohieu = (SELECT sohieu FROM tuyen WHERE matuyen = '$MaTuyen')
        SQL);
        $sql->execute();

        return true;
    }

    public function myTicket($ID)
    {
        $smt = "SELECT
                s1.khuvuc AS NoiDi,
                s2.khuvuc AS NoiDen,
                s1.tensanbay AS SanBayDi,
                s2.tensanbay AS SanBayDen,
                DAYOFWEEK(ngaykhoihanh) AS Thu,
                t.NgayKhoiHanh,
                t.GioKhoiHanh,
                v.MaLoai,
                mb.SoHieu,
                hhk.TenHang,
                dv.TrangThai,
                dv.NgayDatVe
            FROM
                Ve v
                INNER JOIN tuyen t ON v.MaTuyen = t.MaTuyen
                INNER JOIN tuyenbay tb ON t.MaTuyenBay = tb.MaTuyenBay
                INNER JOIN sanbay s1 ON tb.SanBayDi = s1.MaSanBay
                INNER JOIN sanbay s2 ON tb.SanBayDen = s2.MaSanBay
                INNER JOIN LoaiVe lv ON v.MaLoai = lv.MaLoai
                INNER JOIN maybay mb ON t.sohieu = mb.sohieu
                INNER JOIN hanghangkhong hhk on hhk.mahang = mb.mahang
                INNER JOIN datve dv on v.madatve = dv.madatve
            WHERE dv.id = '$ID' ";
            
        $result = $this->connection->prepare($smt);
        $result->execute();
        $tickets = array();

        if ($result->rowCount() > 0) {
            // Duyệt qua các kết quả và lưu thông tin vé
            while ($row = $result->fetch()) {
                $tickets[] = $row;
            }
        }
        return $tickets;
    }
}
