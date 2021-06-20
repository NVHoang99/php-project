<?php

require_once "admin/MongoDB/vendor/autoload.php";

function construct() {
    load_model('index');
    load('helper','format');
}

function indexAction() {
    $id = $_GET['id'];
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $products = $shopee->product;
    $list_product = $products->find(["cat_id" => "{$id}"]);
    $data_list_product = iterator_to_array($list_product);
    $data['list_product'] = $data_list_product;
    load_view('index', $data);
}

function detailAction() {
    $id = $_GET['id'];
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $products = $shopee->product;
    $list_product = $products->find(["_id" => new MongoDB\BSON\ObjectId("{$id}")]);
    $data_list_product = iterator_to_array($list_product);
    $data['list_product'] = $data_list_product[0];
    //show_array($data);
    load_view('detail', $data);
}

function addAction() {
    
}

function editAction() {
    
}
