<?php require "../header.php"; ?>
    <?php
    
    extract($_POST);
   
    $name = sanitize0($name);
    $sname = sanitize0($sname);
    $login = strtoupper($login);

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
        "insert into users(name,sname) values (:name, :sname)");
    
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':sname',$sname);
        
    $stmt->execute();   
    $id = $con->lastInsertId(); 

    //---- add login
    $stmt = $con->prepare(
        "insert into logins(user_id,login,pass,expired) values (:userid, :login, :password, :expired)");
    
    $login = trim(strtoupper($login));
    $password = password_hash( $password . $login, PASSWORD_BCRYPT);
     

    $stmt->bindParam(':userid',$id,PDO::PARAM_INT);
    $stmt->bindParam(':login',$login);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':expired',$exdate);
    
    //if(...) $con->rollBack();
    $stmt->execute();

    $con->commit();
    ?>
 <?php require "../footer.php"; ?>