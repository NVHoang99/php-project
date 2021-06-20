<?php

//require_once "admin/MongoDB/vendor/autoload.php";

function add_cart($id) {
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $products = $shopee->product;
    $list_product = $products->find(["_id" => new MongoDB\BSON\ObjectId("{$id}")]);
    $data_list_product = iterator_to_array($list_product);
    $data['product'] = $data_list_product[0];
    //$id_product=$data['product']['_id'];
    $qty = 1;
    //Kiểm tra giỏ hàng đã tồn tại hay chưa nếu tồn tại thì thêm 1
    if (isset($_SESSION['cart']['buy'])) {
        if(array_key_exists($id, $_SESSION['cart']['buy'])){
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }       
    }

    $_SESSION['cart']['buy'][$id] = array(
        'id' => $id,
        'product_title' => $data['product']['title'],
        'price' => $data['product']['price'],
        'product_thumb' => $data['product']['thumb'],
        'code' => $data['product']['code'],
        'qty' => $qty,
        'sub_total' => $data['product']['price'] * $qty
    );
    //Cập nhật hóa đơn
    update_info_cart();
}

function update_info_cart() {
//Dữ liệu tổng trong giỏ hàng
    $num_order = 0;
    $total = 0;
    foreach ($_SESSION['cart']['buy'] as $item) {
        $num_order = $num_order + $item['qty'];
        $total = $total + $item['sub_total'];
    }
    $_SESSION['cart']['info'] = array(
        'num_order' => $num_order,
        'total' => $total,
    );
    //Cập nhật giỏ hàng
}

function get_list_buy_cart() {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $item['url_delete_cart'] = "?mod=cart&controller=index&action=delete&id={$item['id']}";
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}
//
function get_num_order_cart() {
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['num_order'];
    }
    return false;
}

function get_total_cart() {
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}
//
function delete_cart($id) {
    if (isset($_SESSION['cart'])) {
        #xóa sản phẩm có id trong giỏ hàng
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            //cập nhật lại giỏ hàng khi xóa
            update_info_cart();
        } else {
            unset($_SESSION['cart']);
        }
    }
}

//Cập nhật giỏ hàng
function update_cart($qty){
    foreach ($qty as $id=>$new_qty) {
        $_SESSION['cart']['buy'][$id]['qty']=$new_qty;
        $_SESSION['cart']['buy'][$id]['sub_total']=$new_qty*$_SESSION['cart']['buy'][$id]['price'];
    }
    update_info_cart();
}
