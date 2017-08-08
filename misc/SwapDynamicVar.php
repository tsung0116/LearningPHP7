<?php

function Swap($a, $b)
{    
    $x =& $GLOBALS[$a];
    $y =& $GLOBALS[$b];
    $temp = $x;
    $x = $y;
    $y = $temp;
}
$var1 = 'u';
$$var1 = 10;
$u =& $$var1;
$var2 = 'v';
$$var2 = 20;
$v =& $$var2;
Swap($var1, $var2);
echo $$var1 . PHP_EOL;  //20
echo $$var2 . PHP_EOL;  //10