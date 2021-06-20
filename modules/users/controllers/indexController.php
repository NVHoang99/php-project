
<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    //load('lib', 'email');
//    load_view('login');
}

function regLoginAction() {
    global $error, $username, $password, $username1, $password1, $email, $badges_id;
    if (isset($_POST['btn-reg'])) {
        $badges_id=2;
        $error = array();
        #Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để email';
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Tên email không đúng định dạng ";
            } else {
                $email = $_POST['email'];
            }
        }
        #Kiểm tra username
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập ';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng ";
            } else {
                $username = $_POST['username'];
            }
        }
        #Kiểm tra passwword
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu ';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng ";
            } else {
                $password = md5($_POST['password']);
            }
        }

        if (empty($_POST['confirm_password'])) {
            $error['confirm_password'] = 'Không được để trống mật khẩu xác nhận';
        } else {
            if (!is_password($_POST['confirm_password'])) {
                $error['confirm_password'] = "Mật khẩu không đúng định dạng ";
            }
            if(!compare_password($_POST['confirm_password'],$_POST['password'])){
                $error['confirm_password'] = "Mật khẩu không giống nhau ";
            }
        }

        #Kết luận
        if (empty($error)) {
            if (!user_exists($email, $username)) {
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'badges_id'=>$badges_id
                );
                add_user($data);
                //Thông báo
                redirect('?mod=users&action=reg');
            } else {
                $error['account'] = "Email hoặc Username đã tồn tại ";
            }
        }
    }
    if (isset($_POST['btn-login'])) {
        $error = array();
        #Kiểm tra username
        if (empty($_POST['username'])) {
            $error['username1'] = 'Không được để trống tên đăng nhập ';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username1'] = "Tên đăng nhập không đúng định dạng ";
            } else {
                $username1 = $_POST['username'];
            }
        }
        #Kiểm tra passwword
        if (empty($_POST['password'])) {
            $error['password1'] = 'Không được để trống mật khẩu ';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password1'] = "Mật khẩu không đúng định dạng ";
            } else {
                $password1 = md5($_POST['password']);
            }
        }
        #kết luận
        if (empty($error)) {
            if (check_login($username1, $password1)) {
                //lưu trữ phiên đăng nhập
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username1;
                //Chuyển hướng vào bên trong hệ thống
                redirect();
            } else {
                $error['account1'] = 'Tên đăng nhập hoặc mật khẩu không tồn tại ';
            }
        }
    }
    load_view('regLogin');
}



function indexAction() {
    load('helper', 'format');
    $list_users = get_list_users();
    $data['list_users'] = $list_users;
    load_view('index', $data);
}

function logoutAction() {
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect('?mod=home');
}










    