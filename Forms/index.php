<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Addition Form</title>
</head>
<body>
  <form action="process-user.php" method="post">
   <table>
      <tr>
          <td>Имя</td>
          <td><input type="text" name="name"></td>
          </tr>
          <tr>
          <td>Фамилия</td>
          <td><input type="text" name="sname"></td>
          </tr>
          <tr>
          <td>Expired</td>
          <td><input type="date" name="exdate"></td>
      </tr>
   </table>
   <input type="submit">
  </form>    


</body>
</html>