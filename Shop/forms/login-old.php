<?php 
session_start();
header("Cache-Control: no-cache");
header("Bla-Bla-Header: Login page");

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
<?php 
  $a=1;
  ?>  
  <!-- <form action="process-user.php" method="post"> -->
  <form action="process-login.php" method="post">
   <table>
      <tr>
          <tr>
          <td>Login:</td>
          <td><input type="text" name="login"></td>
          </tr>

          <tr>
          <td>Пароль:</td>
          <td><input type="password" name="password"></td>
          </tr>

      </tr>
   </table>
   <input type="submit" value="Войти">
   <br/>

  </form>    
  <h3><?=$_SESSION['Login']??""?></h3>

</body>
</html>