<?php include SRC_DIR . '/admin_header.php' ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Danh sách vé chờ phản hồi</h1>
    <!-- <h5 class="mb-3"><a href="/addorder">Lập hóa đơn</a></h5> -->
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID khách hàng</th>
                    <th scope="col">Mã vé</th>
                    <th scope="col">Mã Tuyến</th>
                    <th scope="col">Ngày đặt vé</th>
                    <th scope="col">Chỗ Ngồi</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statuses as $status) :  ?>
                    <?php if ($status->check == false) : ?>
                        <tr>
                            <td><a class="text-info" href=""><?= html_escape($status->id) ?></a></td>
                            <td><?= html_escape($status->mave) ?></td>
                            <td><?= html_escape($status->matuyen) ?></td>
                            <td><?= html_escape($status->ngaydatve) ?></td>
                            <td><?= html_escape($status->chongoi) ?></td>
                            <td class="text-danger"><?= html_escape($status->trangthai) ?></td>
                            <td><a class="text-primary" href="">Xem chi tiết</a></td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <h1 class="h3 mb-4 text-gray-800">Danh sách vé đã duyệt</h1>
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID khách hàng</th>
                    <th scope="col">Mã vé</th>
                    <th scope="col">Mã Tuyến</th>
                    <th scope="col">Ngày đặt vé</th>
                    <th scope="col">Chỗ Ngồi</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statuses as $status) :  ?>
                    <?php if ($status->check == true) : ?>
                        <tr>
                            <td><a class="text-info" href=""></a><?= html_escape($status->id) ?></td>
                            <td><?= html_escape($status->mave) ?></td>
                            <td><?= html_escape($status->matuyen) ?></td>
                            <td><?= html_escape($status->ngaydatve) ?></td>
                            <td><?= html_escape($status->chongoi) ?></td>
                            <td class="text-success"><?= html_escape($status->trangthai) ?></td>
                            <td><a class="text-primary" href="">Xem chi tiết</a></td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include SRC_DIR . '/admin_footer.php' ?>


</body>

</html>