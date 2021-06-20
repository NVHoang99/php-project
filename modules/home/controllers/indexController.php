<?php

require_once "admin/MongoDB/vendor/autoload.php";

function construct() {
    load_model('index');
}

function indexAction() {
    load('helper','format');
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $products = $shopee->product;
    $list_product_phone = $products->find(['cat_id'=>'1']);
    $list_product_laptop= $products->find(['cat_id'=>'2']);
    $list_product_headphone= $products->find(['cat_id'=>'3']);
    $list_product_fashion= $products->find(['cat_id'=>'4']);
    $list_product_houseware= $products->find(['cat_id'=>'5']);
    $list_product_office= $products->find(['cat_id'=>'6']);     
    $data_list_product_phone = iterator_to_array($list_product_phone); //chuyển đổi chuổi BSon thành chuỗi
    $data_list_product_laptop = iterator_to_array($list_product_laptop);
    $data_list_product_headphone = iterator_to_array($list_product_headphone);
    $data_list_product_fashion = iterator_to_array($list_product_fashion);
    $data_list_product_houseware = iterator_to_array($list_product_houseware);
    $data_list_product_office = iterator_to_array($list_product_office);
    $data['list_phone'] = $data_list_product_phone;
    $data['list_laptop'] = $data_list_product_laptop;
    $data['list_headphone'] = $data_list_product_headphone;
    $data['list_fashion'] = $data_list_product_fashion;
    $data['list_houseware'] = $data_list_product_houseware;
    $data['list_office'] = $data_list_product_office;
    load_view('index', $data);
}

function addAction() {
    echo"đã thêm dữ liệu";
}

function editAction() {
    
}
