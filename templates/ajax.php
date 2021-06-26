<?php
require ('../database/DBController.php');
include ('../database/Product.php');

$db = new DBController();

$product = new Product($db);
$product_shuffle = $product->getData();

if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}