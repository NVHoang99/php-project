<?php
get_header();
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới user</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Username</label>
                        <input type="text" name="username" id="title" value="" >
                        <?php echo form_error('username') ?>
                        <label for="title">Họ và tên</label>
                        <input type="text" name="fullname" id="title" value="" >
                        <?php echo form_error('fullname') ?>
                        <label for="title">Password</label>
                        <input type="text" name="password" id="title" value="" >
                        <?php echo form_error('password') ?>
                        <label for="title">Email</label>
                        <input type="text" name="email" id="title" value="" >
                        <?php echo form_error('email') ?>
                        <label for="title">Tuổi</label>
                        <input type="text" name="age" id="title" value="" >
                        <?php echo form_error('age') ?>
                        <label for="title">Giới tính</label>
                        <select name="gender">
                            <option value="">-- Chọn giới tính --</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                        <?php echo form_error('gender') ?>
                        <label for="title">Số Điện Thoại</label>
                        <input type="text" name="tel" id="title" value="" >
                        <?php echo form_error('phone_number') ?>
                        <label for="title">Địa chỉ</label>
                        <input type="text" name="address" id="title" value="" >
                        <?php echo form_error('address') ?>
                        <label for="title">Quyền</label>
                        <select name="role">
                            <option value="">-- Chọn quyền --</option>
                            <option value="1">admin</option>
                            <option value="2">Người bán</option>
                            <option value="3">Người mua</option>
                        </select>
                        <?php echo form_error('role') ?>
                        <label for="title"></label>
                        <label for="title"></label>

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