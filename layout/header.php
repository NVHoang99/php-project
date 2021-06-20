<!DOCTYPE html>
<html>

<head>
    <title>SHOPEE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />

    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="?mode=home" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="?mod=users&action=regLogin"
                                        title=""><?php if (!isset($_SESSION['user_login'])) echo "Đăng nhập"; ?></a>
                                </li>
                                <li>
                                    <p style="text-align: center; margin-top: 10px; font-size: 20px;color: #c2e211">
                                        <?php if (isset($_SESSION['user_login'])) {
                                            echo "Chào Mừng: {$_SESSION['user_login']}" . " <li> <a href='?mod=users&action=logout' title=''>Đăng xuất</a> </li>";
                                        } ?></p>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="?mode=home" title="" id="logo" class="fl-left">
                            <h1 style="font-size: 35px">SHOPEE</h1>
                        </a>
                        <div id="search-wp" class="fl-left">
                            <form method="POST" action="">
                                <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span
                                        id="num"><?php if (isset($_SESSION['cart']['info']['num_order'])) echo $_SESSION['cart']['info']['num_order']; ?></span>
                                </div>
                                <div id="dropdown">
                                    <dic class="action-cart clearfix">
                                        <a href="<?php echo '?mod=cart&controller=index' ?>" title="Giỏ hàng"
                                            class="view-cart fl-left">Giỏ hàng</a>
                                        <a href="<?php echo '?mod=checkout&controller=index' ?>" title="Thanh toán"
                                            class="checkout fl-right">Thanh toán</a>
                                    </dic>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>