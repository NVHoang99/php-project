<?php
get_header();
?>

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <form method="POST" action="?mod=checkout&controller=index&action=update" name="form-checkout">
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">

                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname"
                                value="<?php echo $info_user['fullname'] ?>">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo $info_user['email'] ?>">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="<?php echo $info_user['address'] ?>">
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone" value="<?php echo $info_user['phone_number'] ?>">
                        </div>
                    </div>

                </div>
            </div>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_buy as $item) {
                            ?>
                            <tr class="cart-item">
                                <td class="product-name"><?php echo $item['product_title'] ?><strong
                                        class="product-quantity">x <?php echo $item['qty'] ?></strong></td>
                                <td class="product-total"><?php echo currency_format($item['sub_total'], 'đ') ?></td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price"><?php echo currency_format($sub_total, 'đ') ?></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="place-order-wp clearfix">
                        <button type="submit" name="btn-order" id="order-now"> Đặt hàng
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>



<?php
get_footer();
?>