<?php
function factor($number)
{
    if ($number == 1) {
        return 1;
    }
    return $number * factor($number - 1);
}

$number = readline();
echo factor($number);
