<?php
$text = readline();
$words = explode(' ', $text);
array_pop($words);
echo implode(' ', $words);
