<?php
get_header();
?>


<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider-01.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><a href="<?php echo '?mode=product&action=index&id=1' ?>"></a></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        foreach ($list_product as $item) {
                        ?>
                        <li>
                            <a href="<?php echo '?mod=product&controller=index&action=detail&id=' . $item['_id'] ?>"
                                title="" class="thumb">
                                <img style="max-width: 220px;" src="<?php echo $item['thumb'] ?>">
                            </a>
                            <a href="<?php echo '?mod=product&controller=index&action=detail&id=' . $item['_id'] ?>"
                                title="" class="product-name"><?php echo $item['title'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['price'], 'đ') ?></span>

                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo '?mod=cart&controller=index&action=add&id=' . $item['_id'] ?>"
                                    title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo '?mod=checkout&controller=index&action=add&id=' . $item['_id'] ?>"
                                    title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
        <?php require 'layout/sidebar.php'; ?>


    </div>
</div>
</div>


<?php
get_footer();
?>