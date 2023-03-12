<?php
$name = 'Aa';
$reg = '/^[a-z ]{2,}$/i';
$match = [];
if(preg_match($reg,$name,$match)) 
print_r($match);




