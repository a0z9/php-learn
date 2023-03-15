<?php require_once "../header.php"; ?>  


  <form action="process-user.php" method="post">
   <table>
      <tr>
          <td>Имя:</td>
          <td><input type="text" name="name" required></td>
          </tr>
          <tr>
          <td>Фамилия:</td>
          <td><input type="text" name="sname" required></td>
          </tr>

          <tr>
          <td>Login:</td>
          <td><input type="text" name="login" required></td>
          </tr>

          <tr>
          <td>Пароль:</td>
          <td><input type="password" name="password" required minlength="4"></td>
          </tr>

          <tr>
          <td>Expired:</td>
          <td><input type="date" name="exdate" required></td>
      </tr>
   </table>
   <input type="submit" value="Сохранить пользователя">
   <br/>
  </form>    
  <?php require "../footer.php"; ?>