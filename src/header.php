<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Flight</title>
    <link rel="short icon" href="/img/icon.png">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/63dafaa4e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>

    <nav class="container-fluid my-div p-0">
        <img class="img-bg" src="/img/Backgroud_1.png" alt="">
        <div class="container-fluid overlay p-0">
            <!-- Nav-Top -->
            <nav class="navbar navbar-expand-lg nav-top ">
                <div class="container d-flex flex-wrap">
                    <ul class="nav me-auto m-1">
                        <li class="nav-item"><a href="#" class="nav-link text-white">(000)-999-990-152</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">myflight@gmail.com</a></li>
                    </ul>
                    <ul class="nav m-1">
                        <li class="nav-item"><a href="https://www.facebook.com/" class="nav-link text-white"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="nav-item"><a href="https://twitter.com/" class="nav-link text-white"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="nav-item"><a href="https://www.instagram.com/" class="nav-link text-white"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a></li>
                        <li class="nav-item">
                            <!-- <a href="#" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-user"></i> <span data-translate="login">Login</span></a> -->
                            <?php
                            if (isset($_SESSION['user_name'])) {
                                echo ' <div class="dropdown">
                                                <a class="btn text-white" href="#" role="button" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-user"></i> <span data-translate="login">' . $_SESSION['user_name'] . '</span>
                                                </a>
                
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="/myprofile/' . $_SESSION['id'] . '">Thông tin</a></li>
                                                    <li><a class="dropdown-item" href="" data-bs-target="#logoutModal" data-bs-toggle="modal">Đăng xuất</a></li>
                                                </ul>
                                            </div> ';
                            } else {
                                echo '<a href="#" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-user"></i> <span data-translate="login">Login</span></a> ';
                            }
                            ?>
                        </li>
                        <li class="nav-item"><a id="langvi" data-lang="vi" class="nav-link text-white"><i><img src="/img/Flag_of_Vietnam.png" alt="" height="25px" width="40px"></i></a></li>
                        <li class="nav-item"><a id="langen" data-lang="en" class="nav-link text-white" style="display: none;"><i><img src="/img/american-flag.webp" alt="" height="25px" width="40px"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Nav-Bot -->
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand text-primary text-white" href="<?= '/' ?>"><img src="/img/logo_preview_rev_1.png" id="logo" alt="" width="70"> My Flight</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: rgb(238, 135, 98)">
                        <div class=" container-fluid offcanvas-header">
                            <a class="navbar-brand text-primary text-white" id="offcanvasNavbarLabel" href="<?= '/' ?>"><img src="/img/logo_preview_rev_1.png" id="logo" alt="" width="70"> My Flight</a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <ul class="navbar-nav offcanvas-body p-0 ps-3">
                            <li class="nav-item"><a data-translate="home" class="nav-link text-white" href="<?= '/' ?>">Home</a></li>
                            <li class="nav-item"><a data-translate="flight" class="nav-link text-white" href="<?= '/flight' ?>">Flight</a></li>
                            <li class="nav-item"><a data-translate="news" href="<?= '/new' ?>" class="nav-link text-white">News</a></li>
                            <li class="nav-item"><a data-translate="guidance" href="<?= '/guidance' ?>" class="nav-link text-white">Guidance</a></li>
                            <li class="nav-item"><a data-translate="contact" href="<?= '/contact' ?>" class="nav-link text-white">Contact</a></li>
                            <li class="nav-item">
                                <?php
                                if (isset($_SESSION['user_name'])) {
                                    echo
                                    ' <a href="/mycart/' . $_SESSION['id'] . '" class="nav-link text-white">
                                                <i class="fa-brands fa-shopify"></i> 
                                                <span data-translate="mycart">My Cart</span>
                                            </a> ';
                                } else {
                                    echo
                                    '<a href="#" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="fa-brands fa-shopify"></i> 
                                            <span data-translate="mycart">My Cart</span>
                                        </a> ';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>