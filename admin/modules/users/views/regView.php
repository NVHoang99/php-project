<?php declare(strict_types=1) ?>
<html>
    <head>
        <title>Đăng nhập tài khoản</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/reg.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wp-form-login">
            <h1 class="page-title">ĐĂNG KÍ TÀI KHOẢN</h1>
            <form id="form-login" action="" method="POST">
                <input type="text" name="fullname" id="username" value="<?php echo set_value('fullname'); ?>" placeholder="fullname"/>
                <?php echo form_error('fullname') ?>
                <input type="text" name="email" id="username" value="<?php error_reporting(0); echo set_value('email');  ?>" placeholder="email"/>
                <?php echo form_error('email') ?>   
                <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Username"/>
                <?php echo form_error('username') ?>
                <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password"/>
                <?php echo form_error('password') ?>
                <input type="submit" name="btn-reg" id="btn-reg" value="ĐĂNG KÍ" />
                <?php echo form_error('account') ?>
            </form>
            <a href="<?php echo base_url("?mod=users&action=login") ?>" id="lost-pass">ĐĂNG NHẬP</a>
        </div>

    </body>
</html>