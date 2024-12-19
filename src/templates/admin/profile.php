<?php include SRC_DIR . '/admin_header.php' ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Danh sách tài khoản khách hàng</h1>

    <!-- Success mess -->
    <?php if (isset($_SESSION['flash_message'])) : ?>
        <div class="mb-4 text-success" id="flash-message">
            <?= $_SESSION['flash_message'] ?>
        </div>
        <?php unset($_SESSION['flash_message']); ?>
    <?php endif; ?>

    <!-- False mess -->
    <?php if (isset($_SESSION['false_message'])) : ?>
        <div class="mb-4 text-danger" id="false-message">
            <?= $_SESSION['false_message'] ?>
        </div>
        <?php unset($_SESSION['false_message']); ?>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">CCCD</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profiles as $ticket) :  ?>
                    <tr>
                        <td><?= html_escape($ticket->email) ?></td>
                        <td><?= html_escape($ticket->hoten) ?></td>
                        <td><?= html_escape($ticket->phone) ?></td>
                        <td><?= html_escape($ticket->cccd) ?></td>
                        <td><?= html_escape($ticket->gioitinh) ?></td>
                        <td><?= html_escape($ticket->ngaysinh) ?></td>
                        <td><?= html_escape($ticket->diachi) ?></td>
                        <td>
                            <button class="btn btn-danger my-1 my-lg-0" style="width: 70px" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="<?= $ticket->id ?>">
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include SRC_DIR . '/admin_footer.php' ?>

<!-- Delete Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Xác nhận xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa dòng này?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a id="deleteLink" href="" class="btn btn-danger">Xóa</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('button.btn-danger').on('click', function() {
            var id = $(this).data('id');
            var deleteLink = '/deleteprofile/' + id;
            $('#deleteLink').attr('href', deleteLink);
        });
    });
</script>
</body>

</html>