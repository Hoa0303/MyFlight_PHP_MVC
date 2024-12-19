<?php include SRC_DIR . '/admin_header.php' ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Danh sách tuyến bay</h1>

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

    <h5 class="mb-3"><a href="/addflight">Thêm tuyến bay</a></h5>

    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Mã tyến bay</th>
                    <th scope="col">Mã sân bay đi</th>
                    <th scope="col">Tên sân bay đi</th>
                    <th scope="col">Điểm khởi hành</th>
                    <th scope="col">Mã sân bay đến</th>
                    <th scope="col">Tên sân bay đến</th>
                    <th scope="col">Điểm đến</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lists as $listflight) :  ?>
                    <tr>
                        <td><?= html_escape($listflight->matuyenbay) ?></td>
                        <td><?= html_escape($listflight->masanbaydi) ?></td>
                        <td>Sân bay <?= html_escape($listflight->tensanbaydi) ?></td>
                        <td><?= html_escape($listflight->khuvucdi) ?></td>
                        <td><?= html_escape($listflight->masanbayden) ?></td>
                        <td>Sân bay <?= html_escape($listflight->tensanbayden) ?></td>
                        <td><?= html_escape($listflight->khuvucden) ?></td>

                        <td>
                            <button class="btn btn-success my-1 my-lg-0 " style='width: 70px'>
                                <a class="text-white" href="<?= '/editflight/' . $listflight->matuyenbay ?>">Edit</a>
                            </button>
                            <button class="btn btn-danger my-1 my-lg-0" style="width: 70px" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="<?= $listflight->matuyenbay ?>">
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
            var deleteLink = '/deleteflight/' + id;
            $('#deleteLink').attr('href', deleteLink);
        });
    });
</script>

</body>

</html>