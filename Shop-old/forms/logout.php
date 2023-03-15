<?php
session_start();

$_SESSION = [];
session_regenerate_id();

$_SESSION['message'] = "Вы успешно вышли из профиля.";
header("Location: redir.php");

