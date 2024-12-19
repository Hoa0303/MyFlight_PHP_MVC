<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giá tuyến mới</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>

    <main class="container">
        <div class="card w-50 m-auto">
            <div class="card-header text-center ">
                <h5>Thêm giá tuyến mới</h5>
            </div>
            <div class="card-body m-auto ">
                <form action="/addpriceflight" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Mã giá tuyến: </label>
                        <input class="form-control" type="text" name="magiatuyen">
                    </div>
                    <div>
                        <label>Mã tuyến bay: </label>
                        <!-- <input class="form-control" type="text" name="tuyenbay"> -->
                        <select name="tuyenbay" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listMaTuyen as $TuyenBay) : ?>
                                <option value="<?= $TuyenBay['MaTuyenBay'] ?>"><?= html_escape($TuyenBay['MaTuyenBay']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label>Giá tuyến: </label>
                        <input class="form-control" type="text" name="giatuyen">
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