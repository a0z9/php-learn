<?php
session_start();
require_once "../db/dbo.php";
require_once "../models/Store.php";

use shop\models\Store;
$store = new Store($con);

$store_ids = [];
$order_qtys = [];

foreach($_POST as $key=>$value)
{
$arr = explode("_",$key);    
if($arr[0]=='chk') $store_ids[] = $arr[1];
}

foreach($_POST as $key=>$value)
{
$arr = explode("_",$key);    
if($arr[0]=='qty' &&  in_array($arr[1].'',$store_ids) ) $order_qtys[] = $value;
}

$order_id = $store->getBasketOrderId($_SESSION['login_id']);
if($order_id) {
$_SESSION['message'] = "Заказ уже существует. Проверьте свою корзину.";
header("Location: redir.php");
exit();
}

//------------------------------------------------
$con->beginTransaction();

// --- create new order!

$stmt = $con->prepare(
    "insert into orders(name,login_id) values (:name, :login_id)");
$order_name = "заказ ####";

$login_id = $_SESSION['login_id'];
$stmt->bindParam(':name',$order_name);
$stmt->bindParam(':login_id',$login_id);
$stmt->execute();   
$order_id_inserted = $con->lastInsertId(); 

// ----- add to order_details & update store -----------
for($i=0; $i<count($store_ids); $i++) {
$store_id = $store_ids[$i];
$order_qty = $order_qtys[$i]; 

// --- insert in order_details ----------
$stmt = $con->prepare(
    "insert into order_details(order_id,store_id,qty) " . 
    "values (:order_id, :store_id, :qty)");

$stmt->bindParam(':order_id',$order_id_inserted,PDO::PARAM_INT);
$stmt->bindParam(':store_id',$store_id,PDO::PARAM_INT);
$stmt->bindParam(':qty',$order_qty);

$stmt->execute();
}

$con->commit();
$_SESSION['message'] = "Товары добавлены успешно. Проверьте свою корзину.";
header("Location: redir.php");
exit();



