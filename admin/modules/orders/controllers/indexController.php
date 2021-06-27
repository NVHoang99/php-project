<?php
require __DIR__ . "../../../../../Neo4jDriver/Laudis/vendor/autoload.php";
require __DIR__ . "../../../../../Neo4jDriver/http/vendor/autoload.php";

function construct()
{
    load_model('index');
    load('lib', 'validation');
    load('lib', 'pagging');
}

function indexAction()
{
    $client = Laudis\Neo4j\ClientBuilder::create()
        ->addHttpConnection('backup', 'http://neo4j:123456@localhost')
        ->addBoltConnection('default', 'bolt://neo4j:123456@localhost')
        ->setDefaultConnection('default')
        ->build();

    $results = $client->run(
        'MATCH (node:Order) return node, node.OrderNumber AS OrderNumber, 
        node.Username AS Username, node.Subtotal AS Subtotal, node.Status AS Status'
    );

    $data['results'] = $results;
    load_view('index', $data);
}



function addAction()
{
}

function editAction()
{
}

function deleteAction()
{
    $client = Laudis\Neo4j\ClientBuilder::create()
        ->addHttpConnection('backup', 'http://neo4j:123456@localhost')
        ->addBoltConnection('default', 'bolt://neo4j:123456@localhost')
        ->setDefaultConnection('default')
        ->build();

    $id = $_GET['id'];
    $client->run(
        "MATCH (n:Order {OrderNumber: '{$id}'})-[h:has]->(o:OrderDetail) DELETE h,n,o"
    );

    redirect('?mod=orders&action=index');
}