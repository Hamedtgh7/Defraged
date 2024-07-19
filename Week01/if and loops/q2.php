<?php
$x = readline();
$n = readline();

if ($n == 0) {
    echo 20;
} elseif ($n == 7) {
    echo $x;
} else {
    $rate = $x - $n;
    if ($rate <= 0) {
        echo 0;
    } else {
        echo $rate;
    }
}
