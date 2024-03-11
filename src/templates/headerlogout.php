<?php 
   require_once __DIR__ . '/../bootstrap.php' ;
    
?>
<!DOCTYPE html>
<html>

<head>
    <title>TN Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Thư viện icon Fontawesome -->
    <link rel="stylesheet" href="../public/assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!-- Css style -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../public/assets/css/base.css">
    <link rel="stylesheet" href="../public/assets/css/main.css">
    <link rel="stylesheet" href="../public/assets/css/grid.css">
    <link rel="stylesheet" href="../public/assets/css/responsive.css">
    <link rel="stylesheet" href="../public/assets/css/cart.css">
    <link rel="icon" href="../public/assets/img/books.png" type="image/x-icon">


</head>

<body>

    <div class="app">
        <header class="app__header">
            <div class="grid wide">
                <nav class="header__navbar hide-on-mobile-tablet">

                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--separate header__navbar-item--has-qr">
                            Vào TN-Shop từ ứng dụng
                            <!--Header QR Code-->
                            <div class="header__qr">
                                <img src="../public/assets/img/QR_code.png" alt="QR_code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="https://play.google.com/store/books?hl=vi&gl=US" class="header__qr-link">
                                        <img src="../public/assets/img/GooglePlay.png" alt="Google GooglePlay"
                                            class="header__qr-download-img">
                                    </a>
                                    <a href="https://www.apple.com/app-store/" class="header__qr-link">
                                        <img src="../public/assets/img/Appstore.png" alt="Appstore"
                                            class="header__qr-download-img">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no-pointer">Kết nối</span>
                            <a href="https://www.facebook.com/" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-notify">
                            <a href="#" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-bell"></i> Thông báo
                            </a>
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h2 class="header__notify-heading"><strong>Đăng nhập để nhận thông báo mới nhất
                                            !</strong></h2>
                                </header>
                                <h1>NôNttify</h1>
                                <footer class="header__notify-footer">
                                    <a href="/public/login.php" class="btn header__notify-footer-btn">
                                        Đăng Nhập
                                    </a>
                                </footer>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <a href="#" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-regular fa-circle-question"></i> Trợ giúp
                            </a>
                        </li>
                        <li
                            class="header__navbar-item header__navbar-item--strong js-register-btn header__navbar-item--separate">
                            <a href="../public/login.php" class="header__navbar-icon-link">Đăng nhập</a>
                        </li>
                        <li class="header__navbar-item header__navbar-item--strong js-register-btn">
                            <a href="../public/login.php" class="header__navbar-icon-link">Đăng ký</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header-with-search -->

                <div class="header-with-search">
                    <!-- Header Mobile More Selection -->
                    <div class="header__mobile-selection">

                        <div class="header__mobile-bars js-barBtn">
                            <i class="header__mobile-bars-icon fa-solid fa-bars"></i>
                        </div>

                        <div class="header__mobile-selection-overlay"></div>


                        <div class="header__mobile-selection-wrap ">
                            <h2 class="header__mobile-selection-heading">Tất cả sản phẩm
                                <i class="fa-solid fa-xmark header__mobile-selection-close-icon js-closeBtn"></i>
                            </h2>
                            <ul class="header__mobile-selection-list">
                                <form action="" method="post" class="header__mobile-selection-list">
                                    <li class="header__mobile-selection-item">
                                        <!-- <a href="index.php?pg=textbook" class="header__mobile-selection__link">Sách giáo
                                        khoa
                                        <span class="header__mobile-selection-item-more">
                                            <i class=" header__mobile-angle-right-icon fa-solid fa-angle-right"></i>
                                        </span>
                                    </a> -->
                                        <button type="submit" name="catelog"
                                            class="btn-dm header__mobile-selection__link-mobile" value="textbook">Sách
                                            giáo khoa
                                        </button>


                                    </li>

                                    <li class="header__mobile-selection-item">
                                        <!-- <a href="index.php?pg=science" class="header__mobile-selection__link">Sách khoa học
                                        <span class="header__mobile-selection-item-more">
                                            <i class=" header__mobile-angle-right-icon fa-solid fa-angle-right"></i>
                                        </span>
                                    </a> -->
                                        <button type="submit" name="catelog"
                                            class="btn-dm header__mobile-selection__link-mobile" value="science">Sách
                                            khoa học
                                        </button>

                                    </li>
                                    <li class="header__mobile-selection-item">
                                        <!-- <a href="index.php?pg=novel" class="header__mobile-selection__link">Tiểu thuyết,
                                        truyện tranh
                                        <span class="header__mobile-selection-item-more">
                                            <i class=" header__mobile-angle-right-icon fa-solid fa-angle-right"></i>
                                        </span>
                                    </a> -->
                                        <button type="submit" name="catelog"
                                            class="btn-dm  header__mobile-selection__link-mobile" value="novel">Tiểu
                                            thuyết, truyện tranh
                                        </button>
                                    </li>
                                </form>

                                <li class="header__mobile-selection-item">
                                    <a href="#" class="header__mobile-selection__link">Tin tức</a>
                                </li>
                                <li class="header__mobile-selection-item">
                                    <a href="#" class="header__mobile-selection__link">Liên hệ</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- End: Header Mobile More Selection -->

                    <label for="mobile-search-checkbox" class="header__mobile-search">
                        <i class="header__mobile-search-icon fas fa-search"></i>
                    </label>

                    <div class="header__logo hide-on-tablet">
                        <a href="index.php" class="header__logo-link">
                            <img src="../public/assets/img/logo.png" class="header__logo-img">

                            </img>
                        </a>
                    </div>

                    <input type="checkbox" hidden id="mobile-search-checkbox" class="header__search-checkbox">

                    <div class="header__search ">
                        <!-- hide-on-mobile -->
                        <div class="header__search-input-wrap">
                            <form action="" method="post">
                                <input type="text" class="header__search-input" name="search"
                                    placeholder="Nhập để tìm kiếm sản phẩm">


                                <!-- Search history -->
                                <div class="header__search-history">
                                    <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                    <ul class="header__search-history-list">
                                        <li class="header__search-history-item">
                                            <a href="index.php?pg=sgk">Sách giáo khoa 10</a>
                                        </li>
                                        <li class="header__search-history-item">
                                            <a href="index.php?pg=khoahoc">Sách khoa học</a>
                                        </li>
                                        <li class="header__search-history-item">
                                            <a href="index.php?pg=tieuthuyet">Tiểu thuyết, truyện tranh</a>
                                        </li>
                                    </ul>
                                </div>
                        </div>



                        <button class="header__search-btn" type="submit">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                        </form>
                    </div>

                    <!-- Cart layout -->
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class=" header__cart-icon fas fa-shopping-cart"></i>

                            <!-- No cart:  header_cart-list--no-cart -->
                            <div class="header__cart-list  ">
                                <img src="../public/assets/img/no_cart.png" alt="img Cart"
                                    class="header__cart-no-cart-img">
                                <span class="header__cart-list-no-cart-msg">
                                    <strong>Chưa có sản phẩm</strong>
                                </span>
                                <!-- <a class="header__cart-login-btn">login</a> -->
                                <a href="login.php" class="header__cart-login-btn btn btn--primary">Đăng nhập</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Sort bar on Tablet -->
            <ul class="header__sort-bar">
                <form action="" method="post" class="header__sort-bar">
                    <li class="header__sort-item">
                        <a href="" class="header__sort-link ">Liên quan</a>
                    </li>
                    <li class="header__sort-item header__sort-item--active">
                        <!-- <a href="" class="">Mới nhất</a> -->
                        <button type="submit" name="new" class="header__sort-link-tablet header__sort-link--active ">Mới
                            nhất</button>
                    </li>
                    <li class="header__sort-item">
                        <!-- <a href="" class="header__sort-link">Bán chạy</a> -->
                        <button type="submit" name="hot" class="header__sort-link-tablet">Bán chạy</button>
                    </li>
                    <li class="header__sort-item">
                        <!-- <a href="" class="header__sort-link">Giá</a> -->
                        <button type="submit" name="sort_desc" class="header__sort-link-tablet"> Giá </button>
                    </li>
                </form>
            </ul>

        </header>