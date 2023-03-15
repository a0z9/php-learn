
<?php require "header.php"; ?>

    <?php
    if($user_is_logged)    echo "<h2> Вы зашли как ". $_SESSION['login'] . "</h2>";
    else echo "<h3> Вы зашли как анонимный пользователь. Ограниченный доступ. </h3>";
     ?>
 
<?php require "footer.php"; ?>

    