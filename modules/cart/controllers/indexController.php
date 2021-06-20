<?php

require_once "admin/MongoDB/vendor/autoload.php";

function construct() {
    load_model('index');
    load('helper', 'format');
}

function indexAction() {
    $list_buy = get_list_buy_cart();
    $num_order = get_num_order_cart();
    $sub_total = get_total_cart();
    $data['list_buy'] = $list_buy;
    $data['num_order'] = $num_order;
    $data['sub_total'] = $sub_total;
    //show_array($data);
    load_view('index', $data);
}

function deleteAction() {
    $id = $_GET['id'];
    delete_cart($id);
    redirect('?mod=cart&controller=index');
}

function addAction() {
    $id = $_GET['id'];
    //echo $id;
    //unset($_SESSION['cart']);
    //echo $data['title'];

    add_cart($id);
    //echo add_cart($id);
    //show_array($data);
    //echo $data['product']['_id'];
    //show_array($_SESSION['cart']);
    redirect('?mod=cart&controller=index');
}

function updateAction() {
    if (isset($_POST['btn_update_cart'])) {
       // echo $_POST['qty'];
        update_cart($_POST['qty']);
        redirect("?mod=cart&controller=index");
    }
}

function delete_allAction() {
    $id = null;
    delete_cart($id);
    redirect('?mod=cart&controller=index');
}
