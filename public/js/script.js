$(function () {
  // translate
  $('#langvi').on("click", function () {
    $('#langvi').css("display", "none");
    $('#langen').css("display", "block");
  })

  $('#langen').on("click", function () {
    $('#langen').css("display", "none");
    $('#langvi').css("display", "block");
  })

  function loadTranslation(language) {
    $.getJSON("/lang/" + language + ".json", function (data) {
      $("[data-translate]").each(function () {
        var key = $(this).data("translate");
        if (data[key]) {
          $(this).text(data[key]);
        }
      });
    });
  }

  $("[data-lang]").click(function () {
    var language = $(this).data("lang");
    loadTranslation(language);
  });

  // From login
  $("#loginForm").validate({
    rules: {
      username: "required",
      pass: "required"
    },
    messages: {
      username: "Email hoặc số điện thoại không hợp lệ",
      pass: "Bạn chưa nhập mật khẩu"
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      if (element.prop("type") === "checkbox") {
        error.insertAfter(element.siblings("label"));
      } else {
        error.insertAfter(element);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass("is-valid").removeClass("is-invalid");
    }
  })

  // From sign up
  $("#signupForm").validate({
    rules: {
      fullname: "required",
      phone: "required",
      pass: {
        required: true,
        minlength: 5
      },
      confirm_pass: {
        required: true,
        minlength: 5,
        equalTo: "#pass"
      },
      email: {
        required: true,
        email: true
      },
      agree: "required"
    },
    messages: {
      fullname: "Bạn chưa nhập vào tên của bạn",
      phone: "Bạn chưa nhập số điện thoại của bạn",
      pass: {
        required: "Bạn chưa nhập mật khẩu",
        minlength: "Mật khẩu phải có ít nhất 5 ký tự",
      },
      confirm_pass: {
        required: "Bạn chưa nhập mật khẩu",
        minlength: "Mật khẩu phải có ít nhất 5 ký tự",
        equalTo: "Mật khâu không trùng khớp với mật khẩu đã nhập"
      },
      email: "Hộp thư điện tử không hợp lệ",
      agree: "Bạn phải đông ý với các quy định của chúng tôi"
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      if (element.prop("type") === "checkbox") {
        error.insertAfter(element.siblings("label"));
      } else {
        error.insertAfter(element);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass("is-valid").removeClass("is-invalid");
    }
  })

  // Log-out

  // book-ticket
  $("#btn2").on("click", function () {
    $("#collapseExample1").css("display", "none");
    $("#collapseExample2").css("display", "block");
  })

  $("#btn1").on("click", function () {
    $("#collapseExample2").css("display", "none");
    $("#collapseExample1").css("display", "block");
  })

  // choice-departure-on-RoundTrip
  $("#selectedDer").on("click", function () {
    $("#choice_der").show();
    $("#choice_des").hide();
  })

  $("#btn-close1").on("click", function () {
    $("#choice_der").hide();
  })

  var showListButton1 = $("#choice_der");
  var selectedDer1 = $("#selectedDer");
  var lists1 = $(".departure");

  lists1.on("click", function (e) {
    item = $(this);
    selectedDer1.val(item.data("departure"))
    showListButton1.hide();
  })

  // choice-desstination-on-RoundTrip
  $("#selectedDes").on("click", function () {
    $("#choice_des").show();
    $("#choice_der").hide();
  })

  $("#btn-close2").on("click", function () {
    $("#choice_des").hide();
  })

  var showListButton2 = $("#choice_des");
  var selectedDer2 = $("#selectedDes");
  var lists2 = $(".desstination");

  lists2.on("click", function (e) {
    item = $(this);
    selectedDer2.val(item.data("desstination"))
    showListButton2.hide();
  })

  // choice-departure-on-OneWay
  $("#selectedDer1").on("click", function () {
    $("#choice_der").show();
    $("#choice_des").hide();
  })

  var showListButton3 = $("#choice_der");
  var selectedDer3 = $("#selectedDer1");
  var lists3 = $(".departure");

  lists3.on("click", function (e) {
    item = $(this);
    selectedDer3.val(item.data("departure"))
    showListButton3.hide();
  })

  // choice-desstination-on-OneWay
  $("#selectedDes1").on("click", function () {
    $("#choice_des").show();
    $("#choice_der").hide();
  })

  var showListButton4 = $("#choice_des");
  var selectedDer4 = $("#selectedDes1");
  var lists4 = $(".desstination");

  lists4.on("click", function (e) {
    item = $(this);
    selectedDer4.val(item.data("desstination"))
    showListButton4.hide();
  })

  //Select-ticket-on-Round-trip
  //Lấy các thẻ có id là "btn-check-chuyenve"
  var btnchuyenve = document.querySelectorAll("#btn-check-chuyenve");
  //Xử lý sự kiện khi click vào các thẻ có id là "btn-check-chuyenve"
  for (var i = 0; i < btnchuyenve.length; i++) {
    btnchuyenve[i].addEventListener('click', function () {
      $("#btn-check-chuyendi").removeClass();
      $("#btn-check-chuyendi").addClass("btn btn-light form-control border");

      for (var i = 0; i < btnchuyenve.length; i++) {
        btnchuyenve[i].classList = "btn btn-primary form-control border";
      }
      // Lấy tất cả các thẻ có id là "chuyendi"
      var elements = document.querySelectorAll("#chuyendi");

      // Lặp qua từng thẻ và đặt thuộc tính style để ẩn chúng
      for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
      }

      // Lấy tất cả các thẻ có id là "chuyenve"
      var elements = document.querySelectorAll("#chuyenve");

      // Lặp qua từng thẻ và đặt thuộc tính style để hiện chúng
      for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = "block";
      }
    });
  }



  // $("#btn-check-chuyenve").on("click", function () {
  //   $("#btn-check-chuyendi").removeClass();
  //   $("#btn-check-chuyendi").addClass("btn btn-light form-control border");
  //   $("#btn-check-chuyenve").removeClass();
  //   $("#btn-check-chuyenve").addClass("btn btn-primary form-control border");

  // })

  $("#btn-check-chuyendi").on("click", function () {
    $("#btn-check-chuyenve").removeClass();
    $("#btn-check-chuyenve").addClass("btn btn-light form-control border");
    $("#btn-check-chuyendi").removeClass();
    $("#btn-check-chuyendi").addClass("btn btn-primary form-control border");

    // Lấy tất cả các thẻ có id là "chuyenve"
    var elements = document.querySelectorAll("#chuyenve");

    // Lặp qua từng thẻ và đặt thuộc tính style để ẩn chúng
    for (var i = 0; i < elements.length; i++) {
      elements[i].style.display = "none";
    }

    // Lấy tất cả các thẻ có id là "chuyendi"
    var elements = document.querySelectorAll("#chuyendi");

    // Lặp qua từng thẻ và đặt thuộc tính style để hiện chúng
    for (var i = 0; i < elements.length; i++) {
      elements[i].style.display = "block";
    }
  })



})