<?php

use App\Models\Profile;

include SRC_DIR . '/header.php' ?>

<div class="container-fluid content_web text-center">
    <h1 class="text-white">My Profile</h1>
</div>
</nav>

<?php include SRC_DIR . '/templates/auth/login.php' ?>

<main id='my-heading'>
    <!-- Success mess -->
    <?php if (isset($_SESSION['flash_message'])) : ?>
        <h3 class="mt-4 mb-1 text-success text-center" id="flash-message">
            <?= $_SESSION['flash_message'] ?>
        </h3>
        <div class="lane m-auto mb-4"></div>
        <?php unset($_SESSION['flash_message']); ?>
    <?php endif; ?>

    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="rounded-circle mb-2 img-thumbnail" src="
                            <?php if ($lists->gioitinh == 'Nam') {
                                echo 'http://bootdey.com/img/Content/avatar/avatar6.png';
                            } else if ($lists->gioitinh == 'Nữ') {
                                echo 'http://bootdey.com/img/Content/avatar/avatar3.png';
                            } else {
                                echo '/img/user.png';
                            }
                            ?>">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form method="post" action="/editmyfrofile">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1">Email (how your name will appear to other users on the site)</label>
                                <input type="hidden" name="id" value="<?= $lists->id ?>">
                                <input type="hidden" name="email" value="<?= $lists->email ?>">
                                <input class="form-control" type="text" value="<?= htmlspecialchars($lists->email) ?>" disabled>
                            </div>
                            <!-- Form Row-->
                            <div class="mb-3">
                                <!-- Form Group (your name)-->
                                <div class="col-12">
                                    <label class="small mb-1" for="inputFirstName">Your name</label>
                                    <input name="hoten" class="form-control" type="text" value="<?= htmlspecialchars($lists->hoten) ?>">
                                </div>
                            </div>
                            <!-- Form Row -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Sex</label>
                                    <select name="gioitinh" class="form-control form-select" type="text">
                                        <option value="" <?php if ($lists->gioitinh == '') echo 'selected' ?>>Khác</option>
                                        <option value="Nam" <?php if ($lists->gioitinh == 'Nam') echo 'selected' ?>>Nam</option>
                                        <option value="Nữ" <?php if ($lists->gioitinh == 'Nữ') echo 'selected' ?>>Nữ</option>
                                    </select>
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">CCCD</label>
                                    <input name="cccd" class="form-control" type="text" value="<?= htmlspecialchars($lists->cccd) ?>">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                <input name="diachi" class="form-control" value="<?= htmlspecialchars($lists->diachi) ?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input name="phone" class="form-control" type="tel" value="<?= htmlspecialchars($lists->phone) ?>">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" type="date" name="birthday" value="<?= htmlspecialchars($lists->ngaysinh) ?>">
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
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