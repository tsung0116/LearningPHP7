<?php

$a = 2;
$b = &$a;
$b = 3;
echo $a . PHP_EOL;
unset($a);
echo $b . PHP_EOL;

$c = 2;
$d = $c;
$d = 3;
echo $c . PHP_EOL;
unset($c);
echo $d . PHP_EOL;