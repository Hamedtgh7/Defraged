<?php
$degrees = explode(' ', readline());

if (array_sum($degrees) == 180 && !in_array('0', $degrees)) {
    echo 'Yes';
} else {
    echo 'No';
}
