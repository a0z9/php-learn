
<hr/>
<a href="<?=$baseURL?>index.php">Home</a><br/>
<?php
if($user_is_logged)  echo "<a href=\"" .$baseURL. "forms/logout.php\">Logout</a><br/>";   
else echo "<a href=\"" .$baseURL . "forms/login.php\">Login</a><br/>";  

if($user_is_admin)  
echo "<a href=\"" .$baseURL. "forms/add-user.php\">Добавить пользователя</a><br/>";   
?>

<a href="<?=$baseURL?>forms/store.php">Товары</a><br/> 

</body>
</html>