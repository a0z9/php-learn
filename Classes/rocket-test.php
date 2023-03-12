<?php
declare(strict_types=1);

require_once "rockets/baserocket.php";
require_once "rockets/light-rocket.php";
require_once "rockets/heavy-rocket.php";

use istu\rockets\AbstractRocket;
use istu\rockets\BaseRocket;
use istu\rockets\HeavyRocket;
use istu\rockets\LightRocket;
use istu\rockets\Ignitable;

function testIgnit(Ignitable $i)
{
  $i->ignit();
}

function testStrict(int $a)
{
 return $a*10;
}


$rocket= new BaseRocket;
$rocket->ignit();

echo $rocket . "\n";

$rocket= new HeavyRocket;
$rocket->ignit();
echo $rocket . "\n";

echo "------------------------------------\n";

//testIgnit("qeee");
//echo testStrict('10') . "\n";
for($i=0;$i<2;$i++) testIgnit(new HeavyRocket);
for($i=0;$i<2;$i++) testIgnit(new LightRocket);

echo "------------------------------------\n";

$r = new LightRocket();
echo ($r instanceof Ignitable) . "\n";
echo ($r instanceof AbstractRocket) . "\n";
echo ($r instanceof BaseRocket) . "\n";
echo (($r instanceof HeavyRocket)?1:0) . "\n";