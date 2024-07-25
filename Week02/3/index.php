<?php

use app\BikeStore;
use app\Clock;
use app\BikeProvider;
use app\ImplementionBikeProvider;

require __DIR__ . '/vendor/autoload.php';

$provider1 = new ImplementionBikeProvider;
$clock = new Clock;
$exipetime = 2 * 60 * 60;

$store = new BikeStore($provider1, $clock, $exipetime);

$bike = $store->borrow();
echo $bike;

$store->restore($bike, true);
echo $store;
