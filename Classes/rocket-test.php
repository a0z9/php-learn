<?php
require_once "rockets/baserocket.php";
require_once "rockets/heavy-rocket.php";

use istu\rockets\BaseRocket;
use istu\rockets\HeavyRocket;
use istu\rockets\Ignitable;

function testIgnit(Ignitable $i)
{
  $i->ignit();
}


$rocket= new BaseRocket;
$rocket->ignit();

echo $rocket . "\n";

$rocket= new HeavyRocket;
$rocket->ignit();
echo $rocket . "\n";

echo "------------------------------------\n";
for($i=0;$i<5;$i++) testIgnit(new HeavyRocket);