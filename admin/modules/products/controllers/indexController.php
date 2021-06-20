<?php
require_once "MongoDB/vendor/autoload.php";


function construct()
{
    load_model('index');
    load('lib', 'validation');
    load('lib', 'pagging');
}

function indexAction()
{
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $products = $shopee->product;
    $list_product = $products->find();
    $data_list_product = iterator_to_array($list_product); //chuyển đổi chuổi BSon thành chuỗi
    $data['list_products'] = $data_list_product;
    load_view('index', $data);
}



function addAction()
{
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $products = $shopee->product;
    global $error, $code, $title, $thumb, $content, $cat_id, $desc, $price;
    if (isset($_POST['btn-add'])) {
        $error = array();
        #Kiểm tra 
        if (empty($_POST['code'])) {
            $error['code'] = 'Không được để trống code';
        } else {
            $code = $_POST['code'];
        }

        if (empty($_POST['title'])) {
            $error['title'] = 'Không được để trống title';
        } else {
            $title = $_POST['title'];
        }

        if (empty($_POST['thumb'])) {
            $error['thumb'] = 'Không được để trống thumb';
        } else {
            $thumb = $_POST['thumb'];
        }

        if (empty($_POST['content'])) {
            $error['content'] = 'Không được để trống content';
        } else {
            $content = $_POST['content'];
        }

        if (empty($_POST['cat_id'])) {
            $error['cat_id'] = 'Không được để trống cat_id';
        } else {
            $cat_id = $_POST['cat_id'];
        }

        if (empty($_POST['price'])) {
            $error['price'] = 'Không được để trống price';
        } else {
            $price = $_POST['price'];
        }


        if (empty($_POST['desc'])) {
            $error['desc'] = 'Không được để trống desc';
        } else {
            $desc = $_POST['desc'];
        }


        #Kết luận
        if (empty($error)) {
            $insertResult = $products->insertOne([
                "title" => "{$title}",
                "price" => "{$price}",
                "code" => "{$code}",
                "desc" => "{$desc}",
                "thumb" => "{$thumb}",
                "content" => "{$content}",
                "cat_id" => "{$cat_id}"
            ]);
            //Thông báo
            redirect('?mod=products&action=index');
        }
    }
    load_view('add');
}

function editAction()
{
    $id = $_GET['id'];
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $products = $shopee->product;
    global $error, $title, $thumb, $desc, $price;
    if (isset($_POST['btn-add'])) {
        $error = array();
        #Kiểm tra 

        if (empty($_POST['title'])) {
            $error['title'] = 'Không được để trống title';
        } else {
            $title = $_POST['title'];
        }

        if (empty($_POST['thumb'])) {
            $error['thumb'] = 'Không được để trống thumb';
        } else {
            $thumb = $_POST['thumb'];
        }

        if (empty($_POST['price'])) {
            $error['price'] = 'Không được để trống price';
        } else {
            $price = $_POST['price'];
        }


        if (empty($_POST['desc'])) {
            $error['desc'] = 'Không được để trống desc';
        } else {
            $desc = $_POST['desc'];
        }
        $set = '$set';
        #Kết luận
        if (empty($error)) {
            $updatedResult = $products->updateOne(
                ["_id" => new MongoDB\BSON\ObjectId("{$id}")],
                [
                    "{$set}" => [
                        "title" => "{$title}",
                        "desc" => "{$desc}",
                        "thumb" => "{$thumb}",
                        "price" => "{$price}"
                    ],
                ]
            );
            //Thông báo
            redirect('?mod=products&action=index');
        }
    }
    load_view('edit');
}

function deleteAction()
{
    $code = $_GET['id'];
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $products = $shopee->product;
    $result = $products->deleteOne(
        ["_id" => new MongoDB\BSON\ObjectId("{$code}")]
    );

    redirect('?mod=products&action=index');
}