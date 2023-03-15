<?php 
session_start();
// register globals
$baseURL = $_SERVER['PATH_INFO']??'/';
$user_is_logged = $_SESSION['login']??false;
$user_is_admin = ($user_is_logged && $_SESSION['login']=='ADMIN');  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$baseURL?>css/table.css">
    <title>Shop</title>
</head>
<body>
<h3>
    <span>Welcome to Shop!</span> &nbsp
    <span><?=$_SESSION['header_message']??""?></span> 
</h3>
<hr/>    