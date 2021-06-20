<html>
    <head>
        <title>Hệ thống điều hướng cơ bản</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wp-form-login">
            <h1 class="page-title">KHÔI PHỤC MẬT KHẨU</h1>
            <form id="form-login" action="" method="POST">
                <input type="text" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="password"/>
                <?php echo form_error('email') ?>
                <input type="submit" name="btn-new-pass" id="btn-login" value="LƯU MẬT KHẨU" />
                <?php echo form_error('account') ?>
            </form>
            <a href="<?php echo base_url('?mod=users&action=login') ?>" id="lost-pass">ĐĂNG NHẬP </a>
            <a href="<?php echo base_url('?mod=users&action=reg') ?>" id="reg-user">ĐĂNG KÍ </a>
            
        </div>

    </body>
</html>