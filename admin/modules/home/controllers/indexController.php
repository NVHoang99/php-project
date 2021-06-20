<?php

function construct() {
    load_model('index');
    load('lib', 'validation');
    load('lib', 'pagging');
}

function indexAction() {
    load('helper', 'format');
    $num_row = db_num_rows("SELECT * FROM `tbl_users`");
    $num_per_page = 8;
    $total_row = $num_row;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    $list_users = get_list_users($start, $num_per_page);
    $data['list_users'] = $list_users;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['start'] = $start;
    load_view('index', $data);
}

function addAction() {
    global $error, $username, $phone_number, $email, $fullname, $address, $password, $gender, $role;
    if (isset($_POST['btn-add'])) {
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
            if (strlen($_POST['tel']) > 15) {
                $error['tel'] = 'Số điện thoại không được vượt quá 15 kí tự';
            } else {
                $phone_number = $_POST['tel'];
            }
        }
        #Kiểm tra gender
        if (empty($_POST['gender'])) {
            $error['gender'] = 'Không được để giới tính';
        } else {
            $gender = $_POST['gender'];
        }
        #kiểm tra age
        if (empty($_POST['age'])) {
            $error['age'] = 'Không được để giới tính';
        } else {
            $age = $_POST['age'];
        }
        #Kiểm tra role
        if (empty($_POST['role'])) {
            $error['role'] = 'Không được để role';
        } else {
            $role = $_POST['role'];
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

        #Kiểm tra password
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống password';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Tên đăng nhập không đúng định dạng";
            } else {
                $password = md5($_POST['password']);
            }
        }
        #Kết luận
        if (empty($error)) {
            $data = array(
                'username' => $username,
                'fullname' => $fullname,
                'password' => $password,
                'email' => $email,
                'gender' => $gender,
                'age' => $age,
                'address' => $address,
                'phone_number' => $phone_number,
                'role' => $role
            );
            add_user($data);
            //Thông báo
            redirect('?mod=home&action=index');
        }
    }
    load_view('add');
}

function DeleteAction() {
    $id = $_GET['id'];
    $user = get_user_by_id($id);
    if (!check_user($user['username'], user_login())) {
        //Kiểm tra không đươc xoa nếu ban user bạn đăng nhâp là user này
        delete_user($id);
        redirect('?mod=home&action=index');
    }
    redirect('?mod=home&action=index');
}

function editAction() {
    $id = $_GET['id'];
    global $error, $username, $phone_number, $email, $fullname, $address, $gender, $role;
    if (isset($_POST['btn-add'])) {
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
            if (strlen($_POST['tel']) > 15) {
                $error['tel'] = 'Số điện thoại không được vượt quá 15 kí tự';
            } else {
                $phone_number = $_POST['tel'];
            }
        }
        #Kiểm tra gender
        if (empty($_POST['gender'])) {
            $error['gender'] = 'Không được để giới tính';
        } else {
            $gender = $_POST['gender'];
        }
        #kiểm tra age
        if (empty($_POST['age'])) {
            $error['age'] = 'Không được để giới tính';
        } else {
            $age = $_POST['age'];
        }
        #Kiểm tra role
        if (empty($_POST['role'])) {
            $error['role'] = 'Không được để role';
        } else {
            $role = $_POST['role'];
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
                'username' => $username,
                'fullname' => $fullname,
                'email' => $email,
                'gender' => $gender,
                'age' => $age,
                'address' => $address,
                'phone_number' => $phone_number,
                'role' => $role
            );
            edit_user($id, $data);
            //Thông báo
            redirect('?mod=home&action=index');
        }
    }
    $info_users = get_user_by_id($id);
    $data['info_users'] = $info_users;
    load_view('edit', $data);
}
