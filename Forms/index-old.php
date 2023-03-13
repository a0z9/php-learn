<?php 
session_start();
header("Cache-Control: no-cache");
header("Bla-Bla-Header: User bla page");

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Addition Form</title>
</head>
<body>
<?php 
  $a=1;
  ?>  
  <!-- <form action="process-user.php" method="post"> -->
  <form action="process-user-old.php" method="post">
   <table>
      <tr>
          <td>Имя:</td>
          <td><input type="text" name="name"></td>
          </tr>
          <tr>
          <td>Фамилия:</td>
          <td><input type="text" name="sname"></td>
          </tr>
          <tr>
          <td>Expired:</td>
          <td><input type="date" name="exdate"></td>
      </tr>
   </table>
   <input type="submit" value="Сохранить пользователя">
   <br/>
   <button type="submit" id="sbt"> DATA </button>

  </form>    
  <h3><?=$_SESSION['User Name']??""?></h3>

</body>
</html>