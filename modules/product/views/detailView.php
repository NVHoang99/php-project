<?php
get_header();
?>

<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img style="max-width: 350px;" id="zoom" src="<?php echo $list_product['thumb'] ?>" data-zoom-image="<?php echo $list_product['thumb'] ?>"/>
                        </a>
                        
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="public/images/img-pro-01.png" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $list_product['title'] ?></h3>
                        <div class="desc">
                            <p>Mã sản phẩm: <?php echo $list_product['code'] ?></p>
                            <p>Thông số: <?php echo $list_product['content'] ?></p>

                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">Còn hàng</span>
                        </div>
                        <p class="price"><?php echo currency_format($list_product['price'], 'đ'); ?></p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="<?php echo '?mod=cart&controller=index&action=add&id='.$list_product['_id'] ?>" title="Th?mod=cart&controller=index&action=add&id='.$list_product['_id'] ?êm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <p><?php echo $list_product['desc'] ?>)</p>
                </div>
            </div>
            
        </div>
        <?php require 'layout/sidebar.php'; ?>
    </div>
</div>


<?php
get_footer();
?>