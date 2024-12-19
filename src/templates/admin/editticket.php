<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiệu chỉnh vé</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>

    <main class="container">
        <div class="card w-25 m-auto">
            <div class="card-header text-center ">
                <h5>Hiệu chỉnh vé</h5>
            </div>
            <div class="card-body">
                <form action="/editticket" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="mave" value="<?= html_escape($ticket->mave) ?>">
                    <div>
                        <label>Mã vé: </label>
                        <input class="form-control" type="text" value="<?= html_escape($ticket->mave) ?>" disabled>
                    </div>
                    <div>
                        <label>Mã tuyến: </label>
                        <select name="matuyen" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listroute as $matuyen) : ?>
                                <option value="<?= $matuyen['MaTuyen'] ?>" <?php if ($matuyen['MaTuyen'] == $ticket->matuyen) echo 'selected' ?>>
                                    <?= html_escape($matuyen['MaTuyen']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label>Mã loại: </label>
                        <select name="maloai" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listticket as $maloai) : ?>
                                <option value="<?= $maloai['MaLoai'] ?>" <?php if ($maloai['MaLoai'] == $ticket->maloai) echo 'selected' ?>>
                                    <?= html_escape($maloai['MaLoai']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label>Chỗ ngồi: </label>
                        <input class="form-control" type="text" name="chongoi" value="<?= html_escape($ticket->chongoi) ?>">
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