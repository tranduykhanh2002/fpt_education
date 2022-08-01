<head>
    <meta charset="UTF-8">
    <meta name="description" content="Xiao Haha">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xiao Haha</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300&display=swap"
        rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=CLIENT_ASSET?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=CLIENT_ASSET?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=CLIENT_ASSET?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=CLIENT_ASSET?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?=CLIENT_ASSET?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?=CLIENT_ASSET?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=CLIENT_ASSET?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=CLIENT_ASSET?>css/style.css" type="text/css">
    <link rel="shortcut icon" href="<?=CLIENT_ASSET?>img/logo-small.png">
    <link rel="stylesheet" href="<?=ADMIN_ASSET?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> -->

</head>


<?php include_once "./client/business/cart.php";?>
<style>
.nut_dropdown {
    border: none;
    background-color: none;
}

/* Thiết lập vị trí cho thẻ div với class dropdown*/
.dropdown {
    position: relative;
    display: inline-block;
}

/* Nội dung Dropdown */
.noidung_dropdown {
    /*Ẩn nội dung các đường dẫn*/
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Thiết kế style cho các đường dẫn trong Dropdown */
.noidung_dropdown a {
    text-align: left;
    color: black;
    padding: 12px;
    text-decoration: none;
    display: block;
}

/* thay đổi màu background khi hover vào đường dẫn */
.noidung_dropdown a:hover {
    background-color: #ddd;
}

/* hiển thị nội dung dropdown khi hover */
.dropdown:hover .noidung_dropdown {
    display: block;
}


/* Thay đổi màu background cho nút khi được hover */
</style>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?=BASE_URL?>trang-chu"><img src="<?=CLIENT_ASSET?>img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">

            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i>Đăng nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class=""><a href="<?=BASE_URL?>trang-chu">Trang Chủ</a></li>
                <li><a href="<?=BASE_URL?>san-pham">Sản phẩm</a></li>

                <li><a href="<?=BASE_URL?>tin-tuc">Tin Tức</a></li>
                <li><a href="<?=BASE_URL?>lien-he">Liên Hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> quandmph13848@fpt.edu.vn</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <?php foreach (pdo_select("SELECT * FROM contact LIMIT 1") as $key) {?>
                            <ul>
                                <li><i class="fa fa-envelope"></i><?php echo $key['email'] ?></li>
                            </ul>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/Xiao-HaHa-111735664678169" target="_blank"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/xiao_haha_adm" target="_blank"><i
                                        class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/xiaohaha.adm/" target="_blank"><i
                                        class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>

                            <div class="header__top__right__auth">
                                <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] != null): ?>
                                <div
                                    style="display:flex; justify-content:flex-end; min-width:80px;align-items: center;">
                                    <div class="dropdown">
                                        <div style="color: #6666FF;" class="mr-2 nut_dropdown"><i id="drop"
                                                class="fa fa-chevron-down mr-1" aria-hidden="true">
                                            </i><?=$_SESSION['auth']['name']?></div>
                                        <div class="noidung_dropdown">
                                            <a
                                                href="<?=BASE_URL . 'tai-khoan/cap-nhat?id=' . $_SESSION['auth']['id']?>">Thông
                                                tin tài khoản</a>
                                            <a href="<?=BASE_URL . 'don-hang'?>">Đơn hàng</a>
                                            <a href="<?=BASE_URL . 'gio-hang'?>">Giỏ hàng</a>
                                            <a href="<?=BASE_URL . 'tai-khoan/dia-chi'?>">Địa chỉ nhận hàng</a>
                                            <a href="<?=BASE_URL . 'tai-khoan/dang-xuat'?>">Đăng xuất</a>
                                        </div>
                                    </div>

                                </div>
                                <?php else: ?>
                                <a href="<?=BASE_URL?>tai-khoan/dang-nhap"> Đăng nhập</a>
                                <?php endif?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class=" col-lg-3">
                    <div class="header__logo">
                        <a href="<?=BASE_URL?>trang-chu"><img src="<?=CLIENT_ASSET?>img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="<?=BASE_URL?>trang-chu">Trang Chủ</a></li>
                            <li><a href="<?=BASE_URL?>san-pham">Sản Phẩm</a></li>

                            <li class=""><a href="<?=BASE_URL?>tin-tuc">Tin Tức</a></li>
                            <li><a href="<?=BASE_URL?>lien-he">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>

                            <li><?php if (isset($_SESSION['auth']) && $_SESSION['auth'] != null): ?>
                                <a href="<?=BASE_URL . 'san-pham-yeu-thich'?>">
                                    <?php endif?><i class="fa fa-heart"></i> <span>
                                        <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] != null): ?>
                                        <?=count(getFavoriteProducts())?>
                                        <?php endif?>
                                    </span></a>
                            </li>
                            <li><a href="gio-hang"><i class="fa fa-shopping-bag"></i>
                                    <span><?php echo countCart() ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh Mục</span>
                        </div>
                        <ul>
                            <?php
$listdanhmuc = loadall_danhmuc();
?>
                            <?php foreach ($listdanhmuc as $danhmuc): ?>
                            <?php if ($danhmuc['show_menu'] == 1): ?>
                            <li><a
                                    href="<?=BASE_URL . 'san-pham?id-danhmuc=' . $danhmuc['id']?>"><?=$danhmuc['name']?></a>
                            </li>
                            <?php endif;?>

                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="<?=BASE_URL?>san-pham" method="get">
                                <input type="text" name="keyword" value="<?=$keyword = ''?>"
                                    placeholder="Bạn cần tìm sản phẩm...">
                                <button type="submit" class="site-btn">Tìm Kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <?php foreach (pdo_select("SELECT * FROM contact LIMIT 1") as $key) {?>
                                <h5><?php echo $key['phone'] ?></h5>
                                <?php }?>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->