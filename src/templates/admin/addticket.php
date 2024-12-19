<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm vé mới</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>

    <main class="container">
        <div class="card w-25 m-auto">
            <div class="card-header text-center ">
                <h5>Thêm vé mới</h5>
            </div>
            <div class="card-body">
                <form action="/addticket" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Mã vé: </label>
                        <input class="form-control" type="text" name="mave">
                    </div>
                    <div>
                        <label>Mã tuyến: </label>
                        <!-- <input class="form-control" type="text" name="matuyen"> -->
                        <select name="matuyen" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listroute as $matuyen) : ?>
                                <option value="<?= $matuyen['MaTuyen'] ?>"><?= html_escape($matuyen['MaTuyen']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label>Mã loại: </label>
                        <!-- <input class="form-control" type="text" name="maloai"> -->
                        <select name="maloai" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listticket as $maloai) : ?>
                                <option value="<?= $maloai['MaLoai'] ?>"><?= html_escape($maloai['MaLoai']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label>Chỗ ngồi: </label>
                        <input class="form-control" type="text" name="chongoi">
                    </div>
                    <div>
                        <label></label>
                        <button class="form-control  btn btn-primary" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>