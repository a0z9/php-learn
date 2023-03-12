<?php
require "rockets/baserocket.php";
require "rockets/heavy-rocket.php";

use istu\rockets\BaseRocket;
use istu\rockets\HeavyRocket;

$rocket= new BaseRocket;
$rocket->ignit();

echo $rocket . "\n";

$rocket= new HeavyRocket;
$rocket->ignit();
echo $rocket . "\n";