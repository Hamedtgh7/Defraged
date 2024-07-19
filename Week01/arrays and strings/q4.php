<?php
$text = readline();

echo preg_replace("/[^0-9.,]/", '', $text);
