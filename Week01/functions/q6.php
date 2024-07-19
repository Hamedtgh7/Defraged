<?php
function palindrome($text)
{
    $reverse = strrev($text);
    $size = strlen($text);

    for ($i = 0; $i <= floor($size / 2); $i++) {
        if ($text[$i] != $reverse[$i]) {
            return false;
        }
    }
    return true;
}

$string = readline();
if (!palindrome($string)) {
    echo 'String is not palndrome';
} else {
    echo 'String is palindrome';
}
