<?php 
// login controller
session_start();
require_once "../db/dbo.php";
require_once "../utils/functions.php";
   
    extract($_POST);
   
    $login = sanitize0($login);
    //$login = strtolower($login);
    
    
    $stmt = $con->prepare(
        "select pass from logins where login=:login");
    $stmt->bindParam(':login',$login);
    $stmt->execute();
    $res = $stmt->fetch();
    foreach($res as $row) $loginHash = $row;   
    //----- check pass
    if(password_verify($password . strtolower($login),$loginHash))
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

 