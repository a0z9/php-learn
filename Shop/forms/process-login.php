<?php 
// login controller
session_start();
require_once "../db/dbo.php";
require_once "../utils/functions.php";
require_once "../models/Login.php";

use shop\models\Login;
   
    extract($_POST);
   
    $login = sanitize0($login);
    $login = strtoupper($login);
    
    $loginObj = new Login($con,$login,$password);
    if( $loginObj -> tryLogin())
    {
        $_SESSION['login'] = $login;
        $_SESSION['login_id'] = $loginObj -> getId();
        $_SESSION['message'] = "Success Auth as " . $login;
        $_SESSION['header_message'] = "С возвращением, " . $login . "!";
    }
    else{
        $_SESSION = [];
        //session_regenerate_id();
        $_SESSION['message'] = "Error Auth..";
    }
    header("Location: redir.php");
    exit();

 