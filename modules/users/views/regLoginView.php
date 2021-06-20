<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"
        ></script>
        <link href="public/reg_login.css" rel="stylesheet" type="text/css"/>
        <title>Sign in & Sign up Form</title>
    </head>
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="" class="sign-in-form" method="POST">
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="username" value="" placeholder="Username" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" value=""  placeholder="Password" />
                        </div>
                        <input type="submit" name="btn-login" value="Login" class="btn solid" />     

                        <div class="social-media">
                            <?php echo form_error('account1') ?>
                            <?php echo form_error('username1') ?>
                            <?php echo form_error('password1') ?>
                        </div>
                    </form>
                    <form action="" class="sign-up-form" method="POST">
                        <h2 class="title">Sign up</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="username"  placeholder="Username" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email"  placeholder="Email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password"  placeholder="Password" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirm_password"  placeholder="Confirm Password" />
                        </div>
                        <input type="submit" name="btn-reg" class="btn"  value="Sign up" />

                        <div class="social-media">
                            <?php echo form_error('account') ?>
                            <?php echo form_error('username') ?>
                            <?php echo form_error('password') ?>
                            <?php echo form_error('email') ?>
                            <?php echo form_error('confirm_password') ?>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>New here ?</h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                            ex ratione. Aliquid!
                        </p>
                        <button class="btn transparent" id="sign-up-btn">
                            Sign up
                        </button>
                    </div>
                    <img src="public/images/img/login.svg" class="image" alt="" />
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>One of us ?</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                            laboriosam ad deleniti.
                        </p>
                        <button class="btn transparent" id="sign-in-btn">
                            Sign in
                        </button>
                    </div>
                    <img src="public/images/img/signup.svg" class="image" alt="" />
                </div>
            </div>
        </div>

        <script src="public/js/app.js"></script>
    </body>
</html>
