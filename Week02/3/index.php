<?php

require __DIR__ . '/vendor/autoload.php';

use app\BikeStore;
use app\Clock;
use app\BikeProvider;
use app\ImplementionBikeProvider;
use app\bike;

$provider1 = new ImplementionBikeProvider;
$clock = new Clock;
$exipetime = 2 * 60 * 60;

$store = new BikeStore($provider1, $clock, $exipetime);

$bike = $store->borrow();
print_r($store->borrowedCount());


$store->restore($bike, true);
print_r($store->borrowedCount());
