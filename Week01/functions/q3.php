<?php
function reverse($string)
{
    return strrev($string);
}

$string = readline();
echo reverse($string);
