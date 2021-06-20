<?php


function update_pass($data, $reset_token) {
    return db_update('tbl_users', $data, "`reset_token`='{$reset_token}'");
}



function info_user($label = 'id') {
    $user_login = $_SESSION['user_login'];
    $user = db_fetch_array("SELECT * FROM `tbl_users` WHERE `email` = '{$user_login}'");
    return $user[$label];
}

function add_user($data) {
    return db_insert('tbl_users', $data);
}

function delete_user($id) {
    return db_delete('tbl_users', "`user_id`='{$id}'");
}


function get_list_users($start, $num_per_page = 10, $where = "") {
    if (!empty($where)) {
        $where = "WHERE {$where}";
    }
    $result = db_fetch_array("SELECT * FROM `tbl_users` {$where} LIMIT {$start},{$num_per_page}");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

function check_user($user1, $user2){
    if($user1==$user2)
        return true;
    return false;
}

function edit_user($id, $data) {
    return db_update('tbl_users', $data, "`user_id`='{$id}'");
}



