<?php
$string1 = readline();
$string2 = readline();

$index = strspn($string1 ^ $string2, "\0");
echo 'First difference between two strings at position ' . $index . ':' . "\n";
echo '"' . $string1[$index] . '"' . ' Vs ' . '"' . $string2[$index] . '"';
