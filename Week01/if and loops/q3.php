<?php
$numbers = str_split(readline());

foreach ($numbers as $number) {
    echo $number . ': ' . str_repeat($number, $number) . "\n";
}
