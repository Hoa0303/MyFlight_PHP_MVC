<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiệu chỉnh máy bay</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>

    <main class="container">
        <div class="card w-50 m-auto">
            <div class="card-header text-center ">
                <h5>Hiệu chỉnh máy bay</h5>
            </div>
            <div class="card-body m-auto">
                <form action="/editplane" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="sohieu" value="<?= html_escape($list->sohieu) ?>">
                    <div>
                        <label>Mã sân bay: </label>
                        <input type="text" value="<?= html_escape($list->sohieu) ?>" disabled>
                    </div>
                    <div>
                        <label>Tên sân bay: </label>
                        <input type="text" name="soghe" value="<?= html_escape($list->soghe) ?>">
                    </div>
                    <div>
                        <label>Khu vực: </label>
                        <input type="text" name="mahang" value="<?= html_escape($list->mahang) ?>">
                    </div>
                    <button class="form-control  btn btn-primary" type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>