<?php
function currency_format($number, $suffix = 'đ'){
    return number_format($number).$suffix;
}

function show_gender($gender) {
    $list_gender = array(
        'male' => 'Nam',
        'female' => 'Nữ'
    );
    if (array_key_exists($gender, $list_gender)) {
        return $list_gender[$gender];
    }
}

function show_role($role) {
    $list_role = array(
        '1' => 'Admin',
        '2' => 'Người bán',
        '3' => 'Người mua hàng'
    );
    if (array_key_exists($role, $list_role)) {
        return $list_role[$role];
    }
}
