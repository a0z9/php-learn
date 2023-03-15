<?php 
session_start();
require_once "../db/dbo.php";
require_once "../utils/functions.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Process Page</title>
</head>
<body>
    <?php
    
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
        $_SESSION['message'] = "Error Auth..";
    }
    header("Location: redir.php");
        exit();

    ?>
    <h2>
        <pre>
        Login:&nbsp<?=$login?> <br/>
        Pass:&nbsp<?=$loginHash?> <br/>
        </pre>   
    </h2>   

</body>
</html>