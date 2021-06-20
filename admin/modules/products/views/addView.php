<?php
get_header();
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Mã sản phẩm</label>
                        <input type="text" name="code" id="title" value="" >
                        <?php echo form_error('code') ?>
                        <label for="title">Tên sản phẩm</label>
                        <input type="text" name="title" id="title" value="" >
                        <?php echo form_error('title') ?>
                        <label for="title">Hình ảnh</label>
                        <input type="text" name="thumb" id="title" value="" placeholder="Vui lòng nhập link hình ảnh vào" >
                        <?php echo form_error('thumb') ?>
                        <label for="title">Mô Tả</label>
                        <input type="text" name="desc" id="title" value="" >
                        <?php echo form_error('desc') ?>
                        <label for="title">Giá</label>
                        <input type="text" name="price" id="title" value="" >
                        <?php echo form_error('price') ?>
                        <label for="title">Cấu hình</label>
                        <input type="text" name="content" id="title" value="" >
                        <?php echo form_error('content') ?>
                        <label for="title">Danh muc</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="1">Điện Thoại</option>
                            <option value="2">Laptop</option>
                            <option value="3">Tai Nghe</option>
                            <option value="4">Thời trang</option>
                            <option value="5">Đồ Gia Dụng</option>
                            <option value="6">Thiết bị văn phòng</option>
                        </select>
                        <?php echo form_error('cat_id') ?>   

                        <button type="submit" name="btn-add" id="btn-submit">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>