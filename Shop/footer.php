
<hr/>
<?php
    if(isset($_SESSION['login']))
    {
      echo "<a href=\"forms/logout.php\">Logout</a><br/>";   
    }
    else
    {
      echo '<a href="forms/login.php">Login</a><br/>';  
    }

    ?>
    </body>
</html>