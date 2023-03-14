<?php
require "vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ .'test.log', Level::Info));

// add records to the log
$log->warning('PHP learn IRKUTSK - 2023');
