<?php

require_once "../models/Store.php";
require_once "../db/dbo.php";

use shop\models\Store;

$store = new Store($con);
$res = $store->getAllProducts();

print_r($res);
