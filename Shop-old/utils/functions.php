<?php

function sanitize0(string $str): string
{
    $str = trim($str);
    $str = stripslashes($str);
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = htmlspecialchars($str);
    return $str ;
}