<?php
$keys = explode(" ", readline());
$values = explode(" ", readline());
$filter = explode(" ", readline());

$n = sizeof($keys);

for ($i = 0; $i < $n; $i++) {
    $first_array[$keys[$i]] = $values[$i];
}

foreach ($filter as $filter_key) {
    unset($first_array[$filter_key]);
}

print_r($first_array);
