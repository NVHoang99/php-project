<?php

function compare_password($pass1, $pass2) {
    if ($pass1 == $pass2) {
        return true;
    }
    return false;
}

function update_user_login($username, $data) {
    return db_update('tbl_users', $data, "`username` = '{$username}'");
}

function get_user_by_username($username) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    if (!empty($item))
        return $item;
}

function check_email($email) {
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
    echo $check_user;
    if ($check_user > 0)
        return TRUE;
    return FALSE;
}

function update_reset_token($data, $email) {
    return db_update('users', $data, "`email`='{$email}'");
}

function check_reset_token($reset_token) {
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token` = '{$reset_token}'");
    echo $check_user;
    if ($check_user > 0)
        return TRUE;
    return FALSE;
}

function update_pass($data, $reset_token) {
    return db_update('tbl_users', $data, "`reset_token`='{$reset_token}'");
}

function check_login($username, $password) {
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `password` = '{$password}' AND `username` = '{$username}'");
    echo $check_user;
    if ($check_user > 0)
        return true;
    return false;
}

function info_user($label = 'id') {
    $user_login = $_SESSION['user_login'];
    $user = db_fetch_array("SELECT * FROM `tbl_users` WHERE `email` = '{$user_login}'");
    return $user[$label];
}

function add_user($data) {
    return db_insert('tbl_users', $data);
}

function user_exists($email, $username) {
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}' OR `username` = '{$username}'");
    echo $check_user;
    if ($check_user > 0)
        return true;
    return false;
}

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

function active_user($active_token) {
    return db_update('tbl_users', array('is_active' => 1), "`active_token`='{$active_token}'");
}

function check_active_token($active_token) {
    $check_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'");
    echo $check_token;
    if ($check_token > 0)
        return true;
    return false;
}





