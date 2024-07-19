<?php
$keys = explode(' ', readline());
$values = explode(' ', readline());
$color = array();

$n = sizeof($keys);

for ($i = 0; $i < $n; $i++) {
    $color[$keys[$i]] = $values[$i];
}

//$color=array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');

foreach ($color as $key => $value) {
    $lower[$key] = strtolower($value);
    $upper[$key] = strtoupper($value);
}

echo 'Values are in lower case:' . "\n";
echo str_replace("\n", "", print_r($lower, true)) . "\n";
echo 'Values are in upper case:' . "\n";
echo str_replace("\n", "", print_r($upper, true));
