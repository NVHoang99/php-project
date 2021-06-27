<?php
require_once "admin/MongoDB/vendor/autoload.php";
require_once "Neo4jDriver/Laudis/vendor/autoload.php";
require_once "Neo4jDriver/http/vendor/autoload.php";

function construct()
{
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    if (!is_login()) {
        redirect('?mod=users&action=regLogin');
    } else {

        $list_buy = get_list_buy_cart();
        $num_order = get_num_order_cart();
        $sub_total = get_total_cart();
        $data['list_buy'] = $list_buy;
        $data['num_order'] = $num_order;
        $data['sub_total'] = $sub_total;
        $info_user = get_user_by_username(user_login());
        $data['info_user'] = $info_user;
        load_view('index', $data);
    }
}

function deleteAction()
{
}

function addAction()
{
    if (!is_login()) {
        redirect('?mod=users&action=regLogin');
    } else {
        $id = $_GET['id'];
        add_cart($id);
        redirect('?mod=checkout&controller=index');
    }
}

function updateAction()
{

    $client = Laudis\Neo4j\ClientBuilder::create()
        ->addHttpConnection('backup', 'http://neo4j:123456@localhost')
        ->addBoltConnection('default', 'bolt://neo4j:123456@localhost')
        ->setDefaultConnection('default')
        ->build();

    $list_buy = get_list_buy_cart();
    $num_order = get_num_order_cart();
    $sub_total = get_total_cart();

    if (isset($_POST['btn-order'])) {
        $username = $_SESSION['user_login'];
        $total = $sub_total;
        $ordernumber = md5($username . time());
        $orderdetailnumber = md5($username . time());
        $client->run(
            "Create (:Order {OrderNumber: '{$ordernumber}' ,Username: '{$username}', Subtotal: '{$total}', 
            Status: 1})"
        );
        foreach ($list_buy as $item) {
            $productName = $item['product_title'];
            $qty = $item['qty'];
            $price =  $item['sub_total'];

            $client->run(
                "
                    Create (:OrderDetail {OrderDetailNumber: '{$orderdetailnumber}', Username: '{$username}', 
                    ProductName: '{$productName}', Qty:'{$qty}', Price:'{$price}'});
                "
            );
            $client->run(
                "
                    MATCH (a:Order), (b:OrderDetail)
                    WHERE a.OrderNumber = '{$ordernumber}' AND b.OrderDetailNumber = '{$orderdetailnumber}' 
                    AND b.ProductName = '{$productName}'
                    CREATE (a)-[r:has]->(b)
                    RETURN r.name 
                "
            );
        }
        $id = null;
        delete_cart($id);
        redirect('?mod=home&controller=index');
    }
}