<?php
function is_all_lowercase($string)
{
    $lower = strtolower($string);
    if (strcmp($lower, $string) == 0) {
        return true;
    } else {
        return false;
    }
}

$string = readline();
if (!is_all_lowercase($string)) {
    echo 'String is not all lowercase.';
} else {
    echo 'String is all lowercase.';
}
