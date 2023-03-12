<?php

namespace test;
//class A {}

require_once "core/a2.class.php";
require_once "core/a.class.php";

use \core\data\A;
use \core\data as cd;


$a = new A;
//$a = new A("Data");
//echo $a->data . "\n";
echo $a->getData() . "\n";
echo "Version: " . A::VERSION . "\n";
echo "Object a: " . (new A) . "\n";
echo "Counter: " .  A::getCounter() . "\n";


//$a -> d = 100; // динамич. св-ва будут отменены в  php9!!!
//$a -> c = 100;

$a = null;
$a = new A(1000);
//Hooks test

echo $a->v;
$a->c = 10;
$a->call1(1,2,3);

//Clone test
//$b = $a;
$b = clone $a;
//$b->setData(1);
echo "\n+++++++--------- b-> " . $b . "\n";
echo "\n+++++++--------- a-> " . $a . "\n";

// Serialize test
//1
$str_a = serialize($a);
$fd = fopen("a.data.txt","w+");
fwrite($fd,$str_a);
fclose($fd);
print_r($a);

//2
$fd = fopen("a.data.txt","r");
$str_c = fread($fd, filesize("a.data.txt"));
fclose($fd);
$c = unserialize($str_c);
print_r($c);

