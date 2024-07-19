<?php
function sorting($a)
{
    sort($a);
    return $a;
}

$a = explode(" ", readline());
print_r(sorting($a));
