<?php
$n = readline();

for ($i = 0; $i <= $n; $i++) {
    echo str_repeat(' ', $n - $i);
    echo str_repeat('*', 2 * $i + 1) . "\n";
}

for ($i = $n; $i > 0; $i--) {
    echo str_repeat(' ', $n + 1 - $i);
    echo str_repeat('*', 2 * $i - 1) . "\n";
}
