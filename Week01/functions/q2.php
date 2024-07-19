<?php
function prime($number)
{
    if ($number < 1) {
        return false;
    }
    if ($number == 2) {
        return true;
    }
    if ($number % 2 == 0) {
        return false;
    }
    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

$number = readline();
if (!prime($number)) {
    echo 'The Number is Not Prime.';
} else {
    echo 'The Number is Prime';
}
