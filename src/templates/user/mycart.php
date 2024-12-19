<?php include SRC_DIR . '/header.php' ?>

<div class="container-fluid content_web text-center">
  <h1 class="text-white">Travel your way</h1>
</div>
</nav>

<?php include SRC_DIR . '/templates/auth/login.php' ?>

<main>
  <div class="container" id="my-heading">
    <div class="row mt-3">
      <!-- Left-Col -->
      <div class="col-md-4 col-12 my-div">
        <!-- My profile  -->
        <div class="card mb-3" style="background-color: aliceblue">
          <div class="card-header text-center bg-light">
            <i class="fa-solid fa-magnifying-glass"></i> Thông tin khách hàng
          </div>
          <div class="card-body row" method="post" action="/searchticket">
            <div class="col-12 mt-2 mb-2">
              <input type="text" class="form-control" value="<?= htmlspecialchars($lists->hoten) ?>">
            </div>

            <div class="col-12 mt-2 mb-2">
              <input type="text" class="form-control" value="<?= htmlspecialchars($lists->email) ?>">
            </div>

            <div class="col-md-6 col-12 mt-2 mb-2">
              <input type="text" class="form-control" value="<?= htmlspecialchars($lists->cccd ?? '') ?>">
            </div>

            <div class="col-md-6 col-12 mt-2 mb-2">
              <input type="text" class="form-control" value="<?= htmlspecialchars($lists->phone) ?>">
            </div>

            <div class="col-12 mt-2 mb-2">
              <input type="text" class="form-control" value="<?= htmlspecialchars($lists->diachi ?? '') ?>">
            </div>
          </div>
        </div>
      </div>

      <!-- Right-Col -->
      <div class="col-md-8 col-12">
        <div class="row">
          <div class="col-md-12 col-12 mb-3">
            <h4 class="text-center">Vé đã đặt</h4>
            <div class="lane m-auto mb-4"></div>
          </div>
        </div>

        <?php $myTickets = $_SESSION['myTicket'] ?? '' ?>
        <?php foreach ($myTickets as $myTicket) : ?>
          <h4 class="text-info">Ngày đặt vé: <?= htmlspecialchars($myTicket['NgayDatVe']) ?></h4>
          <div class="card p-2 mb-3" id="chuyendi" style="background-color: aliceblue;">
            <div class="row">
              <div class="col-lg-2  col-md-4 col-sm-4 col-12 text-center">
                <p><?= htmlspecialchars($myTicket['TenHang']) ?></p>
                <p><span><?= htmlspecialchars($myTicket['SoHieu']) ?></span> - <span><?= htmlspecialchars($myTicket['MaLoai']) ?></span></p>
              </div>

              <div class="col-lg-4 col-12 text-center">
                <p></p>
                <h4><b><span><?= htmlspecialchars($myTicket['NoiDi']) ?></span> - <span><?= htmlspecialchars($myTicket['NoiDen']) ?></span></b></h4>
              </div>

              <div class="col-lg-4 col-12 text-center">
                <p>Thứ <span><?= htmlspecialchars($myTicket['Thu']) ?></span> - <span><?= htmlspecialchars($myTicket['NgayKhoiHanh']) ?></span> - <span><?= htmlspecialchars($myTicket['GioKhoiHanh']) ?></span></p>
                <h6>Sân bay <span><?= htmlspecialchars($myTicket['SanBayDi']) ?></span> - Sân bay <span><?= htmlspecialchars($myTicket['SanBayDen']) ?></span></h6>
              </div>

              <div class="col-lg-2 col-12 text-center">
                <p><a href="#" class="text-success ">Xem chi tiết vé</a></p>
                <?php if ($myTicket['TrangThai'] == 'Đang chờ duyệt') echo '<a class="text-danger">' . htmlspecialchars($myTicket['TrangThai']) . '</a>';
                else {
                  echo '<a class="text-primary">' . htmlspecialchars($myTicket['TrangThai']) . '</a>';
                }
                ?>
              </div>

            </div>
          </div>
        <?php endforeach ?>
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