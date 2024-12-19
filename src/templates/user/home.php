<?php include SRC_DIR . '/header.php' ?>

<div class="container-fluid content_web text-center">
  <h1 class="text-white">Happiness isn’t a destination, it’s a journey we are on</h1>
  <!-- Hạnh phúc không phải là một điểm đến, mà nó là hành trình mà chúng ta đang đi. -->
</div>
</nav>

<?php include SRC_DIR . '/templates/auth/login.php' ?>

<main>
  <!-- Book Tickets -->
  <div class="container-sm bookticket mt-3 my-div">
    <div class="row mt-2">
      <p class="d-inline-flex gap-1">
        <button data-translate="roundtrip" class="btn btn-primary col-xxl-2 col-md-3 col-6 " id="btn1">Round-trip</button>
        <button data-translate="oneway" class="btn btn-primary col-xxl-2 col-md-3 col-6 " id="btn2">One-way</button>
      </p>
      <!-- Round--Trip -->
      <form class="mb-3" id="collapseExample1" style="display: block;" method="post" action="/searchticket">
        <div class="card card-body bookticket">
          <div class="row ">
            <div class="col-12 col-md-3">
              <div class="mb-3">
                <label data-translate="departurepoint" for="exampleFormControlInput1" class="form-label">Departure
                  point</label>
                <input name="Departurepoint" type="text" class="form-control" id="selectedDer" value="Hồ Chí Minh">
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="mb-3">
                <label data-translate="destination" for="exampleFormControlInput1" class="form-label">Destination</label>
                <input name="Destination" type="text" class="form-control" id="selectedDes" value="Hà Nội">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="mb-3">
                <label data-translate="passengers" for="exampleFormControlInput1" class="form-label">Passengers</label>
                <input name="Passengers" type="number" class="form-control" id="formGroupExampleInput" value="1" min="1" max="50">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 col-12">
              <div class="mb-3">
                <label data-translate="departuredate" for="exampleFormControlInput1" class="form-label">Departure
                  date</label>
                <input name="Departuredate" type="date" class="form-control" id="formGroupExampleInput" value="2023-10-18">
              </div>
            </div>
            <div class="col-md-3 col-12">
              <div class="mb-3">
                <label data-translate="returndate" for="exampleFormControlInput1" class="form-label">Return
                  date</label>
                <input name="Returndate" type="date" class="form-control" id="formGroupExampleInput" value="2023-10-20">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-3">
                <label data-translate="airlines" for="exampleFormControlInput1" class="form-label">Airlines</label>
                <select name="Airlines" id="inputState" class="form-select">
                  <option data-translate="selectall" selected>Select all</option>
                  <option>VJ - Vietjet Air</option>
                  <option>VN - Vietnam Airlines</option>
                  <option>QH - Bamboo Airways</option>
                  <option>VU - Vietravel Airlines</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-md-6 col-12">
              <button name="search" type="submit" class="btn btn-primary mb-3 form-control"><i class="fa-solid fa-magnifying-glass"></i>
                <span data-translate="search">Search</span></button>
            </div>
          </div>
        </div>
      </form>

      <!-- One-Way -->
      <form class="mb-3" id="collapseExample2" style="display: none;" method="post" action="/searchticket">
        <div class="card card-body bookticket">
          <div class="row">
            <div class="col-md-3 col-12">
              <div class="mb-3">
                <label data-translate="departurepoint" for="exampleFormControlInput1" class="form-label">Departure point</label>
                <input name="Departurepoint" type="text" class="form-control" id="selectedDer1" value="Hồ Chí Minh">
              </div>
            </div>
            <div class="col-md-3 col-12">
              <div class="mb-3">
                <label data-translate="destination" for="exampleFormControlInput1" class="form-label">Destination</label>
                <input name="Destination" type="text" class="form-control" id="selectedDes1" value="Hà Nội">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-3">
                <label data-translate="passengers" for="exampleFormControlInput1" class="form-label">Passengers</label>
                <input name="Passengers" type="number" class="form-control" id="formGroupExampleInput" value="1" min="1" max="50">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-6">
              <div class="mb-3">
                <label data-translate="departuredate" for="exampleFormControlInput1" class="form-label">Departure
                  date</label>
                <input name="Departuredate" type="date" class="form-control" id="formGroupExampleInput" value="2023-10-18">
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="mb-3">
                <label data-translate="airlines" for="exampleFormControlInput1" class="form-label">Airlines</label>
                <select name="Airlines" id="inputState" class="form-select">
                  <option data-translate="selectall" selected>Select all</option>
                  <option>VJ - Vietjet Air</option>
                  <option>VN - Vietnam Airlines</option>
                  <option>QH - Bamboo Airways</option>
                  <option>VU - Vietravel Airlines</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-md-6 col-12">
              <button name="search" type="submit" class="btn btn-primary mb-3 form-control" href="#"><i class="fa-solid fa-magnifying-glass"></i>
                <span data-translate="search">Search</span></button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Choice--Derparture -->
    <div class="container-fluid mt-3 address" id="choice_der" style="display: none;">
      <div class="mb-3">
        <div class="card card-body bookticket">
          <div class="row">
            <div class="col-11 col-md-11">Lựa chọn thành phố khởi hành</div>
            <div class="col-1 col-md-1"><button type="button" class="btn-close" id="btn-close1"></button></div>
          </div>
          <div class="row text-center">
            <div class="col-12 col-md-4">
              <div class="mb-3">
                <label data-translate="departurepoint" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Bắc</b></span></label>
                <hr>
                <ul class="p-0 text-primary text-start">
                  <li class="departure" data-departure="Hà Nội">Hà Nội (HAN)</li>
                  <li class="departure" data-departure="Hải Phòng">Hải Phòng (HPH)</li>
                  <li class="departure" data-departure="Điện Biên">Điện Biên (DIN)</li>
                  <li class="departure" data-departure="Quảng Ninh">Quảng Ninh (VDO)</li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="mb-3">
                <label data-translate="destination" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Nam</b></span></label>
                <hr>
                <ul class="p-0 text-primary text-start">
                  <li class="departure" data-departure="Hồ Chí Minh">Hồ Chí Minh (SGN)</li>
                  <li class="departure" data-departure="Phú Quốc">Phú Quốc (PQC)</li>
                  <li class="departure" data-departure="Cần Thơ">Cần Thơ (VCA)</li>
                  <li class="departure" data-departure="Cà Mau">Cà Mau (CAH)</li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="mb-3">
                <label data-translate="passengers" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Trung</b></span></label>
                <hr>
                <ul class="p-0 text-primary text-start">
                  <li class="departure" data-departure="Huế">Huế (HUI)</li>
                  <li class="departure" data-departure="Đà Nẵng">Đà Nẵng (DAD)</li>
                  <li class="departure" data-departure="Lâm Đồng">Lâm Đồng (DLI)</li>
                  <li class="departure" data-departure="Nha Trang">Nha Trang (CXR)</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Choice--Desstination -->
    <div class="container-fluid mt-3 address" id="choice_des" style="display: none;">
      <div class="mb-3">
        <div class="card card-body bookticket">
          <div class="row">
            <div class="col-11 col-md-11">Lựa chọn thành phố đến</div>
            <div class="col-1 col-md-1"><button type="button" class="btn-close" id="btn-close2"></button></div>
          </div>
          <div class="row text-center">
            <div class="col-12 col-md-4">
              <div class="mb-3">
                <label data-translate="departurepoint" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Bắc</b></span></label>
                <hr>
                <ul class="p-0 text-primary text-start">
                  <li class="desstination" data-desstination="Hà Nội">Hà Nội (HAN)</li>
                  <li class="desstination" data-desstination="Hải Phòng">Hải Phòng (HPH)</li>
                  <li class="desstination" data-desstination="Điện Biên">Điện Biên (DIN)</li>
                  <li class="desstination" data-desstination="Quảng Ninh">Quảng Ninh (VDO)</li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="mb-3">
                <label data-translate="destination" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Nam</b></span></label>
                <hr>
                <ul class="p-0 text-primary text-start">
                  <li class="desstination" data-desstination="Hồ Chí Minh">Hồ Chí Minh (SGN)</li>
                  <li class="desstination" data-desstination="Phú Quốc">Phú Quốc (PQC)</li>
                  <li class="desstination" data-desstination="Cần Thơ">Cần Thơ (VCA)</li>
                  <li class="desstination" data-desstination="Cà Mau">Cà Mau (CAH)</li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="mb-3">
                <label data-translate="passengers" for="exampleFormControlInput1" class="form-label mb-0"><span class="text-primary"><b>Miền Trung</b></span></label>
                <hr>
                <ul class="p-0 text-primary text-start">
                  <li class="desstination" data-desstination="Huế">Huế (HUI)</li>
                  <li class="desstination" data-desstination="Đà Nẵng">Đà Nẵng (DAD)</li>
                  <li class="desstination" data-desstination="Lâm Đồng">Lâm Đồng (DLI)</li>
                  <li class="desstination" data-desstination="Nha Trang">Nha Trang (CXR)</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-4 mb-4">
    <h3 data-translate="tophint" class="m-auto content_1">Top Hints</h3>
  </div>
  <div class="lane m-auto mb-4"></div>

  <!-- Top-Hints -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/Top_Hints/HaNoi.jpg" alt="">
          <h1 class="image-caption_1">Hà Nội</h1>

        </a>
      </div>

      <div class="col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/Top_Hints/Hue.jpg" alt="">
          <h1 class="image-caption_1">Huế</h1>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/Top_Hints/HaLongBay.jpg" alt="">
          <h1 class="image-caption_2">Vịnh Hạ Long</h1>
        </a>
      </div>

      <div class="col-lg-3 col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/Top_Hints/HoiAn.jpg" alt="">
          <h1 class="image-caption_2">Hội An</h1>
        </a>
      </div>

      <div class="col-lg-3 col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/Top_Hints/HoangLienSon.jpg" alt="">
          <h1 class="image-caption_2">Hoàng Liên Sơn</h1>
        </a>
      </div>

      <div class="col-lg-3 col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/Top_Hints/Hinh-anh-cau-vang-Da-Nang-ve-dem.jpg" alt="">
          <h1 class="image-caption_2">Đà Nẵng</h1>
        </a>
      </div>
    </div>

  </div>

  <div class="container mt-4 mb-4">
    <h3 data-translate="news" class="m-auto content_1">News</h3>
  </div>
  <div class="lane m-auto mb-4"></div>

  <!-- News -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/News/News_1.jpg" alt="">
        </a>
        <a href="">
          <p>Thông báo ngừng test Covid-19 khi nhập cảnh Trung Quốc</p>
        </a>
      </div>

      <div class="col-lg-3 col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/News/News_2.jpg" alt="">
        </a>
        <a href="">
          <p>Hộ chiếu gắn chip điện tử bắt đầu áp dụng từ ngày 1/3/2023</p>
        </a>
      </div>

      <div class="col-lg-3 col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/News/News_3.jpg" alt="">
        </a>
        <a href="">
          <p>Bảo hiểm du lịch với chi phí y tế liên quan Covid-19</p>
        </a>
      </div>

      <div class="col-lg-3 col-md-6 col-12 image-container">
        <a href="">
          <img class="img_destination" src="/img/News/News_4.jpg" alt="">
        </a>
        <a href="">
          <p>Du lịch dịp 2/9: Vì sao không bùng nổ, kỳ nghỉ ‘vét’ kén khách?</p>
        </a>
      </div>
    </div>
    <p class="mt-3"><a href="/web/news.php">More ></a></p>
  </div>

  <div class="container mt-4 mb-4">
    <h3 data-translate="whyus" class="m-auto content_1">Why us</h3>
  </div>
  <div class="lane m-auto mb-4"></div>

  <!-- Why us -->
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-4 col-sm-4 col-12">
        <h1><i class="fa-solid fa-scale-balanced"></i></h1>
        <p data-translate="Price transparency commitment">Price transparency commitment</p>
      </div>
      <div class="col-lg-4 col-sm-4 col-12">
        <h1><i class="fa-solid fa-headset"></i></h1>
        <p data-translate="Professional team">Professional team</p>
      </div>
      <div class="col-lg-4 col-sm-4 col-12">
        <h1><i class="fa-solid fa-magnifying-glass"></i></h1>
        <p data-translate="The best search engine commitment">The best search engine commitment</p>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-6 col-sm-6 col-12">
        <h1><i class="fa-solid fa-money-bill-transfer"></i></h1>
        <p data-translate="Safe & convenient payment">Safe & convenient payment</p>
      </div>
      <div class="col-lg-6 col-sm-6 col-12">
        <h1><i class="fa-solid fa-ticket"></i></h1>
        <p data-translate="Ticketing 24/7">Ticketing 24/7</p>
      </div>
    </div>
  </div>
</main>

<?php include SRC_DIR . '/footer.php' ?>

</body>

</html>