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
        <div class="card w-50 m-auto">
            <div class="card-header text-center ">
                <h5>Hiệu chỉnh sân bay</h5>
            </div>
            <div class="card-body m-auto">
                <form action="/editairport" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="masanbay" value="<?= html_escape($list->masanbay) ?>">
                    <div>
                        <label>Mã sân bay: </label>
                        <input type="text" value="<?= html_escape($list->masanbay) ?>" disabled>
                    </div>
                    <div>
                        <label>Tên sân bay: </label>
                        <input type="text" name="tensanbay" value="<?= html_escape($list->tensanbay) ?>">
                    </div>
                    <div>
                        <label>Khu vực: </label>
                        <input type="text" name="khuvuc" value="<?= html_escape($list->khuvuc) ?>">
                    </div>
                    <button class="form-control  btn btn-primary" type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>