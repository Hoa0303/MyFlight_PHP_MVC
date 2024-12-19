<?php include SRC_DIR . '/header.php' ?>

<div class="container-fluid content_web text-center">
    <h1 class="text-white">Come fly with us</h1>
</div>
</nav>

<?php include SRC_DIR . '/templates/auth/login.php' ?>

<main>
    <div class="container mt-5 mb-5 m-auto" id="my-heading">
        <div class="row">
            <!-- Left-Col -->
            <div class="col-md-4 col-12 my-div">
                <!--  -->
                <div class="card mb-3" style="background-color: aliceblue">
                    <div class="card-header text-center bg-light">
                        <i class="fa-solid fa-magnifying-glass"></i> Đặt vé máy bay
                    </div>
                    <form class="card-body row" method="post" action="/searchticket">
                        <div class="col-12 mt-2 mb-2">
                            <input name="Departurepoint" type="text" class="form-control" id="selectedDer" value="<?php echo $departurePoint ?>">
                        </div>

                        <div class="col-12 mt-2 mb-2">
                            <input name="Destination" type="text" class="form-control" id="selectedDes" value="<?php echo $destination ?>">
                        </div>

                        <div class="col-md-6 col-12 mt-2 mb-2">
                            <input name="Departuredate" type="date" class="form-control" id="formGroupExampleInput" value="<?php echo $departureDate ?>">
                        </div>

                        <div class="col-md-6 col-12 mt-2 mb-2">
                            <input name="Returndate" type="date" class="form-control" value="<?php echo $returnDate ?>" id="formGroupExampleInput">
                        </div>

                        <div class="col-12 mt-2 mb-2">
                            <input name="Passengers" type="number" class="form-control" id="formGroupExampleInput" min="1" max="50" value="<?php echo $passengers ?>">
                        </div>

                        <div class="col-12 mt-2 mb-2">
                            <button name="search" type="submit" class="btn btn-primary mb-3 form-control" href="#"><i class="fa-solid fa-magnifying-glass"></i>
                                <span data-translate="search">Search</span></button>
                        </div>
                    </form>
                </div>
                <!-- Choice--Derparture -->
                <div class="container-fluid mt-3 address" id="choice_der" style="display: none;">
                    <div class="mb-3">
                        <div class="card card-body bookticket">
                            <div class="row">
                                <div class="col-11 col-md-11">Lựa chọn thành phố khởi hành</div>
                                <div class="col-1 col-md-1"><button type="button" class="btn-close" id="btn-close1"></button></div>
                            </div>
                            <div class="row text-center">
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label data-translate="departurepoint" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Bắc</b></span></label>
                                        <hr>
                                        <ul class="p-0 text-primary text-start">
                                            <li class="departure" data-departure="Hà Nội">Hà Nội (HAN)</li>
                                            <li class="departure" data-departure="Hải Phòng">Hải Phòng (HPH)</li>
                                            <li class="departure" data-departure="Điện Biên">Điện Biên (DIN)</li>
                                            <li class="departure" data-departure="Quảng Ninh">Quảng Ninh (VDO)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label data-translate="destination" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Nam</b></span></label>
                                        <hr>
                                        <ul class="p-0 text-primary text-start">
                                            <li class="departure" data-departure="Hồ Chí Minh">Hồ Chí Minh (SGN)</li>
                                            <li class="departure" data-departure="Phú Quốc">Phú Quốc (PQC)</li>
                                            <li class="departure" data-departure="Cần Thơ">Cần Thơ (VCA)</li>
                                            <li class="departure" data-departure="Cà Mau">Cà Mau (CAH)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label data-translate="passengers" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Trung</b></span></label>
                                        <hr>
                                        <ul class="p-0 text-primary text-start">
                                            <li class="departure" data-departure="Huế">Huế (HUI)</li>
                                            <li class="departure" data-departure="Đà Nẵng">Đà Nẵng (DAD)</li>
                                            <li class="departure" data-departure="Lâm Đồng">Lâm Đồng (DLI)</li>
                                            <li class="departure" data-departure="Nha Trang">Nha Trang (CXR)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Choice--Desstination -->
                <div class="container-fluid mt-3 address" id="choice_des" style="display: none;">
                    <div class="mb-3">
                        <div class="card card-body bookticket">
                            <div class="row">
                                <div class="col-11 col-md-11">Lựa chọn thành phố đến</div>
                                <div class="col-1 col-md-1"><button type="button" class="btn-close" id="btn-close2"></button></div>
                            </div>
                            <div class="row text-center">
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label data-translate="departurepoint" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Bắc</b></span></label>
                                        <hr>
                                        <ul class="p-0 text-primary text-start">
                                            <li class="desstination" data-desstination="Hà Nội">Hà Nội (HAN)</li>
                                            <li class="desstination" data-desstination="Hải Phòng">Hải Phòng (HPH)</li>
                                            <li class="desstination" data-desstination="Điện Biên">Điện Biên (DIN)</li>
                                            <li class="desstination" data-desstination="Quảng Ninh">Quảng Ninh (VDO)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label data-translate="destination" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Nam</b></span></label>
                                        <hr>
                                        <ul class="p-0 text-primary text-start">
                                            <li class="desstination" data-desstination="Hồ Chí Minh">Hồ Chí Minh (SGN)</li>
                                            <li class="desstination" data-desstination="Phú Quốc">Phú Quốc (PQC)</li>
                                            <li class="desstination" data-desstination="Cần Thơ">Cần Thơ (VCA)</li>
                                            <li class="desstination" data-desstination="Cà Mau">Cà Mau (CAH)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label data-translate="passengers" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Trung</b></span></label>
                                        <hr>
                                        <ul class="p-0 text-primary text-start">
                                            <li class="desstination" data-desstination="Huế">Huế (HUI)</li>
                                            <li class="desstination" data-desstination="Đà Nẵng">Đà Nẵng (DAD)</li>
                                            <li class="desstination" data-desstination="Lâm Đồng">Lâm Đồng (DLI)</li>
                                            <li class="desstination" data-desstination="Nha Trang">Nha Trang (CXR)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 border-0 ">
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-primary form-control" type="button" data-bs-toggle="collapse" data-bs-target="#choice_1" aria-expanded="false" aria-controls="collapseExample">
                            <span class="float-start">Hãng hàng không</span>
                        </button>
                    </p>
                    <div class="collapse" id="choice_1">
                        <input class="mx-3 form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Vietnam Airlines
                        </label> <br>

                        <input class="mx-3 form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Vietjet Air
                        </label> <br>

                        <input class="mx-3 form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Bamboo Airways
                        </label> <br>

                        <input class="mx-3 form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Vietravel Airlines
                        </label> <br>
                    </div>
                </div>

                <div class="card mb-3 border-0 ">
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-primary form-control" type="button" data-bs-toggle="collapse" data-bs-target="#choice_2" aria-expanded="false" aria-controls="collapseExample">
                            <span class="float-start">Thời gian bay</span>
                        </button>
                    </p>
                    <div class="collapse row text-center" id="choice_2">
                        <div class="col-6 p-0 mb-2"><button class="btn btn-light">Đêm đến sáng <br> 00:00 - 06:00</button></div>
                        <div class="col-6 p-0 mb-2"><button class="btn btn-light">Sáng đến trưa <br> 06:00 - 12:00</button></div>
                        <div class="col-6 p-0 mb-2"><button class="btn btn-light">Trưa đến tối <br> 12:00 - 18:00</button></div>
                        <div class="col-6 p-0 mb-2"><button class="btn btn-light">Tối đến đêm <br> 18:00 - 24:00</button></div>
                    </div>
                </div>

                <div class="card mb-3 border-0 ">
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-primary form-control" type="button" data-bs-toggle="collapse" data-bs-target="#choice_3" aria-expanded="false" aria-controls="collapseExample">
                            <span class="float-start">Tiện ích</span>
                        </button>
                    </p>
                    <div class="collapse" id="choice_3">
                        <input class="mx-3 form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Hành lý
                        </label> <br>

                        <input class="mx-3 form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Suất ăn
                        </label> <br>

                        <input class="mx-3 form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Giải trí
                        </label> <br>

                        <input class="mx-3 form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Nguồn sạc/cổng USB
                        </label> <br>
                    </div>
                </div>
            </div>

            <!-- Right-Col -->
            <div class="col-md-8 col-12">
                <div class="row mb">
                    <div class="col-md-6 col-12 mb-3">
                        <button id="btn-check-chuyendi" class="border btn btn-primary  form-control">Chuyến đi</button>
                    </div>
                    <div class="col-md-6 col-12 mb-3">

                        <button id="btn-check-chuyenve" class="border btn btn-light  form-control" <?php if (empty($_SESSION['allTuyenVe'])) echo 'disabled' ?>>Chuyến về
                        </button>
                    </div>
                </div>

                <?php
                if (isset($_SESSION['error']) && empty($_SESSION['allTuyenDi'])) {
                    echo "<h3 class='text-center' >" . $_SESSION['error'] . "</h3>";
                }
                ?>
                <?php $tickets = $_SESSION['allTuyenDi'] ?>

                <!-- Chuyến đi -->
                <?php for ($i = 0; $i < count($tickets); $i++) {
                    echo '<div class="card p-2 mb-3" id="chuyendi" style="background-color: aliceblue;">
                            <div class="row">
                                <div class="col-lg-2  col-md-4 col-sm-4 col-12 text-center">
                                    <p>' . $tickets[$i]['TenHang'] . '</p>
                                    <p>' . $tickets[$i]['SoHieu'] . '</p>
                                    <p>' . $tickets[$i]['MaLoai'] . '</p>
                                </div>

                                <div class="col-lg-3  col-md-4 col-sm-4 col-6">
                                    <p>
                                        Thứ <span> ' . $tickets[$i]['Thu'] . '</span>,
                                        ' . $tickets[$i]['NgayKhoiHanh'] . '
                                    </p>
                                    <h3><b>' . $tickets[$i]['GioKhoiHanh'] . '</b></h3>
                                    <p>Sân bay <span>' . $tickets[$i]['SanBayDi'] . ' </span></p>
                                </div>

                                <div class="col-lg-3  col-md-4 col-sm-4 col-6">
                                    <p>
                                        Thứ <span> ' . $tickets[$i]['Thu'] . '</span>,
                                        ' . $tickets[$i]['NgayKhoiHanh'] . '
                                    </p>
                                    <h3><b>' . $tickets[$i]['GioDen'] . '</b></h3>
                                    <p>Sân bay <span>' . $tickets[$i]['SanBayDen'] . ' </span></p>
                                </div>

                                <div class="col-lg-2  col-md-6 col-sm-6 col-7">
                                    <h5><b>' . $tickets[$i]['GiaVe'] . '</b></h5>
                                    <p>/' . $passengers . ' khách</p>
                                    <p><a href="#">Chi tiết</a></p>
                                </div>
                            

                                <form class="col-lg-2  col-md6 col-sm-6 col-5" action="/checkout" method="post">
                                    <input type="hidden" name="id_tuyendi" value="' . $tickets[$i]['MaTuyen'] . '  ">
                                    <input type="hidden" name="passenger" value="' . $passengers . '">
                                    <input type="hidden" name="loaive_tuyendi" value="' . $tickets[$i]['MaLoai'] . '">';

                    if (isset($_SESSION['allTuyenVe'])) {
                        echo '<button type="button" id="btn-check-chuyenve" data-loai="' . $tickets[$i]['MaLoai'] . '" data-index="' .  $tickets[$i]['MaTuyen'] . '" class="btn btn-primary form-control btn-check-chuyenve">Tiếp tục</button>';
                    } else {
                        echo '<button type="submit" name="submit" class="btn btn-primary form-control">Chọn</button>';
                    }
                    echo '</form>
                            </div>
                            <div class="row"></div>
                        </div>';
                }
                ?>



                <!-- Chuyến về -->
                <?php if (isset($_SESSION['allTuyenVe'])) {
                    $tickets_1 = $_SESSION['allTuyenVe'];
                    for ($i = 0; $i < count($tickets_1); $i++) {
                        echo '<div class="card p-2 mb-3" id="chuyenve" style="background-color: aliceblue; display:none;">
                            <div class="row">
                                <div class="col-lg-2  col-md-4 col-sm-4 col-12 text-center">
                                    <p>' . $tickets_1[$i]['TenHang'] . '</p>
                                    <p>' . $tickets_1[$i]['SoHieu'] . '</p>
                                    <p>' . $tickets_1[$i]['MaLoai'] . '</p>
                                </div>

                                <div class="col-lg-3  col-md-4 col-sm-4 col-6">
                                    <p>
                                        Thứ <span> ' . $tickets_1[$i]['Thu'] . '</span>,
                                        ' . $tickets_1[$i]['NgayKhoiHanh'] . '
                                    </p>
                                    <h3><b>' . $tickets_1[$i]['GioKhoiHanh'] . '</b></h3>
                                    <p>Sân bay <span>' . $tickets_1[$i]['SanBayDi'] . ' </span></p>
                                </div>

                                <div class="col-lg-3  col-md-4 col-sm-4 col-6">
                                    <p>
                                        Thứ <span> ' . $tickets_1[$i]['Thu'] . '</span>,
                                        ' . $tickets_1[$i]['NgayKhoiHanh'] . '
                                    </p>
                                    <h3><b>' . $tickets_1[$i]['GioDen'] . '</b></h3>
                                    <p>Sân bay <span>' . $tickets_1[$i]['SanBayDen'] . ' </span></p>
                                </div>

                                <div class="col-lg-2  col-md-6 col-sm-6 col-7">
                                    <h5><b>' . $tickets_1[$i]['GiaVe'] . '</b></h5>
                                    <p>/' . $passengers . ' khách</p>
                                    <p><a href="#">Chi tiết</a></p>
                                </div>

                                <form class="col-lg-2  col-md6 col-sm-6 col-5" action="/checkout" method="post">
                                    <input type="hidden" id="indexInput" name="id_tuyendi" value="">
                                    <input type="hidden" id="maloaiInput" name="loaive_tuyendi" value="">
                                    <input type="hidden" name="passenger" value="' . $passengers . '">
                                    <input type="hidden" name="id_tuyenve" value="' . $tickets_1[$i]['MaTuyen'] . '">
                                    <input type="hidden" name="loaive_tuyenve" value="' . $tickets_1[$i]['MaLoai'] . '">
                                    <button type="submit" name="submit" class="btn btn-primary form-control">Chọn</button>
                                </form>
                            </div>
                            <div class="row"></div>
                        </div>';
                    }
                }
                ?>

            </div>


        </div>
    </div>
</main>

<script>
    var buttons = document.querySelectorAll(".btn-check-chuyenve");
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var index = this.getAttribute('data-index');
            var loai = this.getAttribute('data-loai');
            document.getElementById('indexInput').value = index;
            document.getElementById('maloaiInput').value = loai;
        });
    });

    window.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('my-heading'); // Thay 'my-heading' bằng ID của thẻ bạn muốn cuộn đến
        if (element) {
            element.scrollIntoView({
                behavior: 'smooth', // Sử dụng 'smooth' để có hiệu ứng cuộn mượt, hoặc 'auto' để cuộn ngay lập tức
            });
        }
    });
</script>

<?php include SRC_DIR . '/footer.php' ?>