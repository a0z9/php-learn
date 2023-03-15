
<?php require "header.php"; ?>

    <?php
    if(isset($_SESSION['login']))
    {
    echo "<h2> Вы зашли как ". $_SESSION['login'] . "</h2>";
    }
    else{
    echo "<h3> Вы зашли как анонимный пользователь. Ограниченный доступ. </h3>";
    }
    ?>
 
<?php require "footer.php"; ?>

    