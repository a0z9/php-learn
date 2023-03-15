<?php require "../header.php"; ?>
<?php 
  $a=1;
  ?>  
    <form action="process-login.php" method="post">
   <table>
          <tr>
          <td>Login:</td>
          <td><input type="text" name="login" required minlength="2"></td>
          </tr>

          <tr>
          <td>Пароль:</td>
          <td><input type="password" name="password" required></td>
          </tr>
          <tr>
            <td></td><td><input type="submit" value="Войти"></td>
          </tr>  

   </table>
      </form>    
 <?php require "../footer.php"; ?>