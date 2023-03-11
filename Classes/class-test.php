<?php

namespace test;
//class A {}

require "core/a2.class.php";
require "core/a.class.php";

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
$a = new A;
//Hooks test

echo $a->v;
$a->c = 10;
$a->call1(1,2,3);

