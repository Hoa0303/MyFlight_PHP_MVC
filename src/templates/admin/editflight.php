<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiệu chỉnh tuyến bay</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>

    <main class="container">
        <div class="card w-50 m-auto">
            <div class="card-header text-center ">
                <h5>Hiệu chỉnh tuyến bay</h5>
            </div>
            <div class="card-body m-auto">
                <form action="/editflight" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="matuyenbay" value="<?= html_escape($route->matuyenbay) ?>">
                    <div>
                        <label>Mã tuyến bay: </label>
                        <input class="form-control" type="text" value="<?= html_escape($route->matuyenbay) ?>" disabled>
                    </div>
                    <div>
                        <label>Mã sân bay đi: </label>
                        <!-- <input class="form-control" type="text" name="sanbaydi" value="<?= html_escape($route->masanbaydi) ?>"> -->
                        <select name="sanbaydi" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listSanBay as $SanBay) : ?>
                                <option value="<?= $SanBay['MaSanBay'] ?>" <?php if ($SanBay['MaSanBay'] == $route->masanbaydi) echo 'selected' ?>>
                                    <?= html_escape($SanBay['MaSanBay']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label>Mã sân bay đến: </label>
                        <!-- <input class="form-control" type="text" name="sanbayden" value="<?= html_escape($route->masanbayden) ?>"> -->
                        <select name="sanbayden" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listSanBay as $SanBay) : ?>
                                <option value="<?= $SanBay['MaSanBay'] ?>" <?php if ($SanBay['MaSanBay'] == $route->masanbayden) echo 'selected' ?>>
                                    <?= html_escape($SanBay['MaSanBay']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
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