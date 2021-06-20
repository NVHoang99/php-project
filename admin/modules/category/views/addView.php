<?php
get_header();
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="name" id="title" value="" >
                        <?php echo form_error('name') ?>
                        <label for="desc">Mô tả</label>
                        <input type="text" name="desc" id="title" value="" >
                        <?php echo form_error('desc') ?>
                        <label>Hình ảnh</label>
                        <input type="text" name="thumb" id="title" value="" placeholder="Vui lòng nhập link hình ảnh vào" >
                        <?php echo form_error('thumb') ?>
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