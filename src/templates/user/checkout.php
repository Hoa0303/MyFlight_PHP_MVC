<?php include SRC_DIR . '/header.php' ?>

<div class="container-fluid content_web text-center">
    <h1 class="text-white">Happiness isn’t a destination, it’s a journey we are on</h1>
    <!-- Hạnh phúc không phải là một điểm đến, mà nó là hành trình mà chúng ta đang đi. -->
</div>
</nav>

<?php include SRC_DIR . '/templates/auth/login.php' ?>

<main>
    <div class="container" id="my-heading">
        <div class="py-3 text-center">
            <h2>Đặt vé</h2>
        </div>
        <div class="lane m-auto mb-4"></div>

        <div class="row g-5">
            <h1 class="text-danger">
                <?php if (isset($_SESSION['mess'])) {
                    echo $_SESSION['mess'];
                    unset($_SESSION['mess']);
                } ?>
            </h1>
            <div class="col-md-7 col-lg-8 h-25 ">
                <h4 class="mb-3">Chiều đi</h4>
                <?php
                $tickets = $_SESSION['tuyendi'];
                ?>
                <?php for ($i = 0; $i < count($tickets); $i++) {
                    echo '<div class="card p-2 mb-3" style="background-color: aliceblue;">
                            <div class="row">
                                <div class="col-lg-4  col-md-4 col-sm-4 col-12 text-center">
                                    <p>' . htmlspecialchars($tickets[$i]['TenHang']) . '</p>
                                    <p>' . htmlspecialchars($tickets[$i]['SoHieu']) . '</p>
                                    <p>' . htmlspecialchars($tickets[$i]['MaLoai']) . '</p>
                                </div>

                                <div class="col-lg-4  col-md-4 col-sm-4 col-6">
                                    <p>
                                        Thứ <span> ' . htmlspecialchars($tickets[$i]['Thu']) . '</span>,
                                        ' . htmlspecialchars($tickets[$i]['NgayKhoiHanh']) . '
                                    </p>
                                    <h3><b>' . htmlspecialchars($tickets[$i]['GioKhoiHanh']) . '</b></h3>
                                    <p>Sân bay <span>' . htmlspecialchars($tickets[$i]['SanBayDi']) . ' </span></p>
                                </div>

                                <div class="col-lg-4  col-md-4 col-sm-4 col-6">
                                    <p>
                                        Thứ <span> ' . htmlspecialchars($tickets[$i]['Thu']) . '</span>,
                                        ' . htmlspecialchars($tickets[$i]['NgayKhoiHanh']) . '
                                    </p>
                                    <h3><b>' . htmlspecialchars($tickets[$i]['GioDen']) . '</b></h3>
                                    <p>Sân bay <span>' . htmlspecialchars($tickets[$i]['SanBayDen']) . ' </span></p>
                                </div>
                            </div>
                            <div class="row"></div>
                        </div>';
                }
                $giatuyen = $tickets[0]['GiaTuyen'];
                $giave = $tickets[0]['GiaLoaiVe'];
                ?>

                <?php if (!empty($_SESSION['tuyenve'])) {
                    echo '<h4 class="mb-3">Chiều về</h4>';
                    $tickets_1 = $_SESSION['tuyenve'];
                }
                ?>
                <?php if (isset($tickets_1)) {
                    for ($i = 0; $i < count($tickets_1); $i++) {
                        echo '<div class="card p-2 mb-3" style="background-color: aliceblue;">
                                <div class="row">
                                    <div class="col-lg-4  col-md-4 col-sm-4 col-12 text-center">
                                        <p>' . htmlspecialchars($tickets_1[$i]['TenHang']) . '</p>
                                        <p>' . htmlspecialchars($tickets_1[$i]['SoHieu']) . '</p>
                                        <p>' . htmlspecialchars($tickets_1[$i]['MaLoai']) . '</p>
                                    </div>
    
                                    <div class="col-lg-4  col-md-4 col-sm-4 col-6">
                                        <p>
                                            Thứ <span> ' . htmlspecialchars($tickets_1[$i]['Thu']) . '</span>,
                                            ' . htmlspecialchars($tickets_1[$i]['NgayKhoiHanh']) . '
                                        </p>
                                        <h3><b>' . htmlspecialchars($tickets_1[$i]['GioKhoiHanh']) . '</b></h3>
                                        <p>Sân bay <span>' . htmlspecialchars($tickets_1[$i]['SanBayDi']) . ' </span></p>
                                    </div>
    
                                    <div class="col-lg-4  col-md-4 col-sm-4 col-6">
                                        <p>
                                            Thứ <span> ' . htmlspecialchars($tickets_1[$i]['Thu']) . '</span>,
                                            ' . htmlspecialchars($tickets_1[$i]['NgayKhoiHanh']) . '
                                        </p>
                                        <h3><b>' . htmlspecialchars($tickets_1[$i]['GioDen']) . '</b></h3>
                                        <p>Sân bay <span>' . htmlspecialchars($tickets_1[$i]['SanBayDen']) . ' </span></p>
                                    </div>
                                </div>
                                <div class="row"></div>
                            </div>';
                    }
                    $giatuyen += $tickets_1[0]['GiaTuyen'];
                    $giave += $tickets_1[0]['GiaLoaiVe'];
                }
                ?>
            </div>

            <!-- Thông tin đơn hàng -->
            <div class="col-md-5 col-lg-4">
                <div class="card">
                    <div class="card-header bg-white ">
                        <b>Đơn hàng của bạn</b>
                    </div>
                    <?php $passenger = $_SESSION['passenger'] ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-title"><span><?= htmlspecialchars($passenger) ?></span> x Người lớn</p>
                            </div>
                            <div class="col-6">
                                <p class="text-end"><span><?= htmlspecialchars($giatuyen * $passenger) ?></span> đ</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-title"><span><?= htmlspecialchars($passenger) ?></span> x Phí dịch vụ</p>
                            </div>
                            <div class="col-6">
                                <p class="text-end"><?= htmlspecialchars($giave * $passenger) ?></span> đ</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-title"><b>Tổng tiền</b></p>
                            </div>
                            <div class="col-6">
                                <p class="text-end mb-0"><span><?= htmlspecialchars($giatuyen * $passenger + $giave * $passenger) ?></span> đ</p>
                            </div>
                        </div>
                        <a href="#">Bạn có mã giảm giá?</a>
                    </div>
                    <div class="card-footer bg-white mb-0">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="text-danger mb-0">Tổng chi phí</h5>
                            </div>
                            <div class="col-6">
                                <p class="text-end mb-0"><span><?= htmlspecialchars($giatuyen * $passenger + $giave * $passenger) ?></span> đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white ">
                        <div class="row">
                            <div class="col-12 mt-2 mb-4">
                                <input type="checkbox"> Tôi chấp nhận <a href="#">điều khoản</a> & <a href="#">điều kiện giá</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thông tin người đặt vé -->
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Thông tin khách hàng</h4>
                <form class="needs-validation mb-4" action="/confirm" method="post">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Your name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '')  ?>" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($_SESSION['email'] ?? '')  ?>" placeholder="you@example.com" required="">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="<?= htmlspecialchars($_SESSION['DiaChi'] ?? '')  ?>" required="">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-check bg-light">
                        <?php
                        $listchongoi_TD = $_SESSION['gheTuyenDi'];
                        $k = 1;
                        while ($k <= $_SESSION['passenger']) {
                            echo '<p class="text-primary">Chọn ghế ngồi cho khách ' . $k . '</p>
                                 <div class="row">
                                    <div class="col-md-2 col-sm-2 col-12">
                                        <p class="mt-2 mb-2">Chiều đi: </p>
                                    </div>
                                    <div class="col-md-8 col-sm-10 col-12 mb-3">
                                        <select class="form-select" aria-label="Default select example" name="TD_' . $k . '" >
                                            <option selected>Chọn ghế</option>';
                            for ($i = 0; $i < count($listchongoi_TD); $i++) {
                                echo '<option value="' . $listchongoi_TD[$i]['chongoi']  . '">' . htmlspecialchars($listchongoi_TD[$i]['chongoi']) . '</option>';
                            }
                            echo '</select>
                                    </div>
                                </div>';

                            if (isset($tickets_1)) {
                                $listchongoi_TV = $_SESSION['gheTuyenVe'];
                                echo '<div class="row">
                                    <div class="col-md-2 col-sm-2 col-12">
                                        <p class="mt-2 mb-2">Chiều về: </p>
                                    </div>
                                    <div class="col-md-8 col-sm-10 col-12 mb-3">
                                        <select class="form-select" aria-label="Default select example" name="TV_' . $k . '">
                                            <option selected>Chọn ghế</option>';
                                for ($i = 0; $i < count($listchongoi_TV); $i++) {
                                    echo '<option value="' . $listchongoi_TV[$i]['chongoi'] . '">' . htmlspecialchars($listchongoi_TV[$i]['chongoi']) . '</option>';
                                }
                                echo '</select>
                                    </div>
                                </div>';
                            }
                            $k++;
                        }
                        ?>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                            <label class="form-check-label" for="credit">Credit card</label>
                        </div>
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
                            <label class="form-check-label" for="debit">MoMo</label>
                        </div>
                        <div class="form-check">
                            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                            <label class="form-check-label" for="paypal">Zalo Pay</label>
                        </div>
                    </div>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="">
                            <small class="text-body-secondary">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="">
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="tuyendi" value="<?= $tickets[0]['MaTuyen'] ?>">
                    <input type="hidden" name="tuyenve" value="<?= $tickets_1[0]['MaTuyen'] ?? '' ?>">
                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?? '' ?>">
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" name="submit" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
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

</body>

</html>