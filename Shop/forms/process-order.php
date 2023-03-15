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

//------------------------------------------------
$con->beginTransaction();

// --- create new order!
$stmt = $con->prepare(
    "insert into orders(name,login_id) values (:name, :login_id)");

$order_name = "заказ ####";

$stmt->bindParam(':name',$order_name);
$stmt->bindParam(':login_id',$_SESSION['login_id']);
    
$stmt->execute();   

$order_id = $con->lastInsertId(); 

// ----- add to order_details & update store -----------
for($i=0; $i<count($store_ids); $i++) {


// --- update store -------
$stmt = $con->prepare(
    "update store set qty=:qty where id=:id");

$store_id = $store_ids[$i];
$store_qty = $store->getProductById($store_id)->qty;
$order_qty = $order_qtys[$i];

$new_qty = $store_qty - $order_qty; // if <0 need check 

$stmt->bindParam(':qty',$new_qty);
$stmt->bindParam(':id',$store_id);
    
$stmt->execute();   

// --- insert in order_details ----------

$stmt = $con->prepare(
    "insert into order_details(order_id,store_id,qty) " . 
    "values (:order_id, :store_id, :qty)");

$stmt->bindParam(':order_id',$order_id,PDO::PARAM_INT);
$stmt->bindParam(':store_id',$store_id,PDO::PARAM_INT);
$stmt->bindParam(':qty',$order_qty);

$stmt->execute();
}

$con->commit();
$_SESSION['message'] = "Довары добавлены успешно. Проверьте свою корзину.";
header("Location: redir.php");
exit();



