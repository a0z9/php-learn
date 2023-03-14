<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>
<body>
    <h2>Welcome to Shop!</h2>
    <?php
    if(isset($_SESSION['login']))
    {
    echo "<h2> Вы зашли как ". $_SESSION['login'] . "</h2>";
    }
    else{
    echo "<h3> Вы зашли как анонимный пользователь. Ограниченный доступ. </h3>";
    }
    ?>
 
    <?php require "footer.php"; ?>

    