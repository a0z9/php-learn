<?php
session_start();
require_once "../db/dbo.php";
require_once "../models/Store.php";

use shop\models\Store;
$store = new Store($con);

$productList = $store->getBasket($_SESSION['login_id']);
$order_id =  $store->getBasketOrderId($_SESSION['login_id']);

$con->beginTransaction();

foreach($productList as $product){

// --- update store -------
$stmt = $con->prepare(
    "update store set qty=:qty where id=:id");

$store_id = $product->id;
$store_qty = $store->getProductById($store_id)->qty;
$order_qty = $product->qty;

$new_qty = $store_qty - $order_qty; // if <0 need check 

$stmt->bindParam(':qty',$new_qty);
$stmt->bindParam(':id',$store_id);
    
$stmt->execute(); 
}

// --- update order -------

$stmt = $con->prepare(
    "update orders set status=:status where id=:order_id");
    $status=1;
    $stmt->bindParam(':status', $status, \PDO::PARAM_BOOL);
    $stmt->bindParam(':order_id', $order_id, \PDO::PARAM_INT);
    $stmt->execute();

$con->commit();

$_SESSION['message'] = "Оплата прошла, ждите посылку.";
header("Location: redir.php");
exit();




