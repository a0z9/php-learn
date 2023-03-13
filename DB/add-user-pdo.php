<?php
try{
$con = new PDO('mysql:host=localhost;dbname=customers','shop_user','pass');
//....

$stmt = $con->prepare(
    "insert into users(name,sname,expired) values (:name, :sname, :expired)");


$name = 'Peter';
$sname = 'The Cat';
$expired = '2025-01-05';

$stmt->bindParam(':name',$name);
$stmt->bindParam(':sname',$sname);
$stmt->bindParam(':expired',$expired);

$stmt->execute();

$res = $con->query('select * from users');
foreach($res as $row) print_r($row);
}
catch(PDOException $ex)
{
 echo $ex->getMessage() . "\n";
 // записать в журнал!!
}
finally {
$con = null;
}

