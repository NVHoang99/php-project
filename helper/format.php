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

function show_category($category) {
    $list_category = array(
        '1' => 'Điện thoại',
        '2' => 'Laptop',
        '3' => 'Tai nghe',
        '4' => 'Thời trang',
        '5' => 'Đồ gia dụng',
        '6' => 'Thiết bị văn phòng',
    );
    if (array_key_exists($category, $list_category)) {
        return $list_category[$category];
    }
}
