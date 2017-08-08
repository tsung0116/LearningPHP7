<?php

function Swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

$var1 = 10;
$var2 = 20;
Swap($var1, $var2);
echo $var1 . PHP_EOL;  //20
echo $var2 . PHP_EOL;  //10