<?php 
session_start();
require_once "db/dbo.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Process Page</title>
</head>
<body>
    <?php
    require_once "utils/functions.php";
    if(!isset($_COOKIE['message']))
    setcookie("message","718687126 page",time() + 60*60, '/');


    //....

    //$name='';
    extract($_POST);
    //extract($_GET);
    //$name = trim($name);
    //$name = strip_tags($name);
    $name = sanitize0($name);
    $sname = sanitize0($sname);

    $_SESSION['cache'] = "on";
    $_SESSION['view'] = "1,2,3";
    $_SESSION['User Name'] = $name;

    //filter_var($name,....)
    //filter_input()
    $reg = '/^[a-z ]{2,}$/i';
    if( !preg_match($reg,$name) ) 
    {
        header("Location: redir.php");
        exit();
    }
    ?>

    <h2>
        <pre>
        Имя:&nbsp<?=$name?> <br/>
        Фамилия:&nbsp<?=$sname?> <br/>
        Login:&nbsp<?=$login?> <br/>
        Expired:&nbsp<?=$exdate?> <br/>
        </pre>   
    </h2>   

    <h3>
        <?php
        echo "Server stats:&nbsp;" . $con->getAttribute(PDO::ATTR_SERVER_INFO) . '<br/>';
        ?>
    </h3>

    <?php
    $con->beginTransaction();

    // --- add user to users table
    $stmt = $con->prepare(
        "insert into users(name,sname,expired) values (:name, :sname, :expired)");
    
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':sname',$sname);
    $stmt->bindParam(':expired',$exdate);
        
    $stmt->execute();   
    $id = $con->lastInsertId(); 

    //---- add login
    $stmt = $con->prepare(
        "insert into logins(user_id,login,password,expires) values (:userid, :login, :password, :expired)");
    
    $password = hash('sha256',$password . strtolower($login));

    $stmt->bindParam(':userid',$id,PDO::PARAM_INT);
    $stmt->bindParam(':login',$login);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':expired',$exdate);
    
    //if(...) $con->rollBack();
    $stmt->execute();

    $con->commit();
    ?>
 <h2> Inserted id: <?=$id?> </h2>

</body>
</html>