
<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');
//    load_view('login');
}

function loginAction() {
    //echo time();
    //echo date("d/m/y");
    global $error, $username, $password;
    if (isset($_POST['btn-login'])) {
        $error = array();
        #Kiểm tra username
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng";
            } else {
                $username = $_POST['username'];
            }
        }
        #Kiểm tra passwword
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng";
            } else {
                $password = md5($_POST['password']);
            }
        }
        #kết luận
        if (empty($error)) {
            if (check_login($username, $password)) {
                //lưu trữ phiên đăng nhập
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                //Chuyển hướng vào bên trong hệ thống
                redirect();
            } else {
                $error['account'] = 'Tên đăng nhập hoặc mật khẩu không tồn tại';
            }
        }
    }
    load_view('login');
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
    redirect('?mod=users&action=login');
}

function resetAction() {
    load_view('reset');
}

function resetOkAction() {
    load_view('resetOk');
}

function updateAction() {
    global $error, $username, $phone_number, $email, $fullname, $address;
    if (isset($_POST['btn-update'])) {
        $error = array();
        #Kiểm tra fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống họ và tên';
        } else {
            $fullname = $_POST['fullname'];
        }
        #Kiểm tra sđt
        if (empty($_POST['tel'])) {
            $error['tel'] = 'Không được để trống SĐT';
        } else {
            if (strlen($_POST['tel']) > 12) {
                $error['tel'] = 'Số điện thoại không được vượt quá 12 kí tự';
            } else {
                $phone_number = $_POST['tel'];
            }
        }
        #Kiểm tra địa chỉ
        if (empty($_POST['address'])) {
            $error['address'] = 'Không được để địa chỉ';
        } else {
            $address = $_POST['address'];
        }
        #Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để email';
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Tên email không đúng định dạng";
            } else {
                $email = $_POST['email'];
            }
        }
        #Kiểm tra username
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng";
            } else {
                $username = $_POST['username'];
            }
        }

        #Kết luận
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'phone_number' => $phone_number,
                'email' => $email,
                'address' => $address
            );
            update_user_login(user_login(), $data);
        }
    }
    $info_user = get_user_by_username(user_login());
    //show_array($info_user);
    $data['info_user'] = $info_user;
    load_view('update', $data);
}

//
//
//function editAction() {
//    $id = (int)$_GET['id'];
//    $item = get_user_by_id($id);
//    show_array($item);
//}






    