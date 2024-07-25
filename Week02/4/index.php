<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\Pants;
use app\Shirt;
use app\Socks;
use app\Jacket;
use app\SummerDiscountStrategy;
use app\WinterDiscountStrategy;
use app\YaldaDiscountStrategy;


$test = new Jacket('Jacket', 'winter', '10');
$test->discountStrategy(new WinterDiscountStrategy());
echo $test->getPrice();
