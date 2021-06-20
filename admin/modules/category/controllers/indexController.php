<?php

require_once "MongoDB/vendor/autoload.php";

function construct() {
    load_model('index');
    load('lib', 'validation');
    load('lib', 'pagging');
}

function indexAction() {

    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $categories = $shopee->category;
    $list_categorie_BSON = $categories->find();
    $list_categories = iterator_to_array($list_categorie_BSON); //chuyển đổi chuổi BSon thành chuỗi
    //show_array($data_list_product);
    $data['list_categories'] = $list_categories;
    load_view('index', $data);
}

function deleteAction() {
    $name = $_GET['name'];

    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $categories = $shopee->category;
    $result = $categories->deleteOne(["name" => "{$name}"]);
    redirect('?mod=category&action=index');
}

function addAction() {
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $categories = $shopee->category;
    global $error, $name, $desc, $thumb;
    if (isset($_POST['btn-add'])) {
        $error = array();
        #Kiểm tra 

        if (empty($_POST['name'])) {
            $error['name'] = 'Không được để trống name';
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['thumb'])) {
            $error['thumb'] = 'Không được để trống thumb';
        } else {
            $thumb = $_POST['thumb'];
        }


        if (empty($_POST['desc'])) {
            $error['desc'] = 'Không được để trống desc';
        } else {
            $desc = $_POST['desc'];
        }


        #Kết luận
        if (empty($error)) {
            $insertResult = $categories->insertOne([
                "name" => "{$name}",
                "desc" => "{$desc}",
                "thumb" => "{$thumb}"
            ]);
            //Thông báo
            redirect('?mod=category&action=index');
        }
    }
    load_view('add');
}

function editAction() {
    $id = $_GET['id'];
    $client = new MongoDB\Client;
    $shopee = $client->shopee;
    $categories = $shopee->category;
    global $error, $desc, $thumb;
    if (isset($_POST['btn-add'])) {
        $error = array();
        #Kiểm tra 
//        if (empty($_POST['name'])) {
//            $error['name'] = 'Không được để trống name';
//        } else {
//            $name = $_POST['name'];
//        }

        if (empty($_POST['thumb'])) {
            $error['thumb'] = 'Không được để trống thumb';
        } else {
            $thumb = $_POST['thumb'];
        }


        if (empty($_POST['desc'])) {
            $error['desc'] = 'Không được để trống desc';
        } else {
            $desc = $_POST['desc'];
        }
        $set='$set';
        
        #Kết luận
        if (empty($error)) {
            $updatedResult = $categories->updateOne(
                    ["_id" => new MongoDB\BSON\ObjectId("{$id}")],
                    ["{$set}" => [
                            "desc" => "{$desc}",
                            "thumb" => "{$thumb}"
                        ],
                    ]
            );
            //Thông báo
            redirect('?mod=category&action=index');
        }
    }
    load_view('edit');
}
