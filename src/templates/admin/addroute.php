<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tuyến mới</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>

    <main class="container">
        <div class="card w-50 m-auto">
            <div class="card-header text-center ">
                <h5>Thêm tuyến mới</h5>
            </div>
            <div class="card-body m-auto">
                <form action="/addroute" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Mã tuyến: </label>
                        <input class="form-control" type="text" name="matuyen">
                    </div>
                    <div>
                        <label>Mã tuyến bay: </label>
                        <!-- <input class="form-control" type="text" name="matuyenbay"> -->
                        <select name="matuyenbay" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listMaTuyenBay as $TuyenBay) : ?>
                                <option value="<?= $TuyenBay['MaTuyenBay'] ?>"><?= html_escape($TuyenBay['MaTuyenBay']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label>Ngày khởi hành: </label>
                        <input class="form-control" type="date" name="ngaykhoihanh">
                    </div>
                    <div>
                        <label>Giờ khởi hành: </label>
                        <input class="form-control" type="time" name="giokhoihanh">
                    </div>
                    <div>
                        <label>Giờ đến: </label>
                        <input class="form-control" type="time" name="gioden">
                    </div>
                    <div>
                        <label>Mã hãng: </label>
                        <!-- <input class="form-control" type="text" name="mahang"> -->
                        <select id='selectBox' name="mahang" class="form-control mx-1 mt-3" aria-label="Default select example">
                            <?php
                            foreach ($listMaHang as $MaHang) : ?>
                                <option value="<?= $MaHang['MaHang'] ?>"><?= html_escape($MaHang['MaHang']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label>Số hiệu: </label>
                        <select name="sohieu" class="form-control mx-1 mt-3" id="selectResult"></select>
                    </div>
                    <div>
                        <label></label>
                        <button class="form-control  btn btn-primary" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="result"></div>
    </main>

</body>
<script script src="../../vendor/jquery/jquery.min.js"></script>
<script>
    var selectedValue = $("#selectBox option:selected").val()

    $("#selectBox").on('change', function() {
        selectedValue = $("#selectBox option:selected").val()

        $.ajax({
            type: 'POST',
            url: '/getMaHang',
            data: {
                mahang: selectedValue
            },
            success: function(response) {
                var data = JSON.parse(response)

                var selectElement = $('#selectResult');
                selectElement.empty();

                for (var i = 0; i < JSON.parse(response).length; i++) {
                    var optionElement = $('<option>').text(data[i].SoHieu).val(data[i].SoHieu);
                    selectElement.append(optionElement);
                }
            }
        });
    })
</script>

</html>