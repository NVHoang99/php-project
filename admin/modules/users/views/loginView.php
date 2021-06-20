<html>
    <head>
        <title>Hệ thống điều hướng cơ bản</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wp-form-login">
            <h1 class="page-title">ĐĂNG NHẬP</h1>
            <form id="form-login" action="" method="POST">
                <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Username"/>
                <?php echo form_error('username') ?>
                <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password"/>
                <?php echo form_error('password') ?>
                <input type="submit" name="btn-login" id="btn-login" value="ĐĂNG NHẬP" />
                <?php echo form_error('account') ?>
            </form>
<!--            <a href="<?php echo base_url('?mod=users&action=reset') ?>" id="lost-pass">QUÊN MẬT KHẨU </a>
            <a href="<?php echo base_url('?mod=users&action=reg') ?>" id="reg-user">ĐĂNG KÍ </a>-->
            
        </div>

    </body>
</html>