<?php

if(!$user_is_admin) 
{
  $_SESSION['message'] = "No such page...";
  header("Location: redir.php");
}