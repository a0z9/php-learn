<?php 
// login controller
session_start();
require_once "../db/dbo.php";
require_once "../utils/functions.php";
require_once "../models/Login.php";

use shop\models\Login;
   
    extract($_POST);
   
    $login = sanitize0($login);
    //$login = strtolower($login);
    
    if( (new Login($con,$login,$password)) -> tryLogin())
    {
        $_SESSION['login'] = $login;
        $_SESSION['message'] = "Success Auth as" . $login;
    }
    else{
        session_destroy();
        session_start();
        $_SESSION['message'] = "Error Auth..";
    }
    header("Location: redir.php");
    exit();

 