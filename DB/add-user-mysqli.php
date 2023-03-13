<?php
try{
$con = new mysqli('localhost', 'shop_user','pass', 'customers');
//$con->options()
//....
if($con->connect_errno)
{
    echo 'Error...' . $con->connect_errno . '<br/>';
    exit();
}

$stmt = $con->prepare(
    "insert into users(name,sname,expired) values (?, ?, ?)");

$name = 'Peter2';
$sname = 'The Cat2';
$expired = '2025-01-05';

$stmt->bind_param('sss',$name,$sname,$expired);

$stmt->execute();

$res = $con->query('select * from users');
foreach($res as $row) print_r($row);
}
catch(Exception $ex)
{
 echo $ex->getMessage() . "\n";
 // записать в журнал!!
}
finally {
$con = null;
}

