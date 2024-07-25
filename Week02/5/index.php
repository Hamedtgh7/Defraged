<?php

require_once __DIR__ . '/vendor/autoload.php';

use trip\TripParam;
use trip\TripHandler;


$matrix = [
    [1, 2, 2, 4, 3],
    [2, 1, 4, 2, 3],
    [3, 5, 1, 3, 2],
    [4, 3, 3, 1, 2],
    [3, 3, 2, 2, 1]
];

$trip_param = new TripParam(0, 1, true, false);
$param = [
    'matrix' => $matrix,
    'params' => $trip_param
];

$test = TripHandler::getInstance();
echo $test->calcPrice('vip', $param);
