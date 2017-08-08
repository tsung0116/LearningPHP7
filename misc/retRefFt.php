<?php

function & retRef()
{
    $value = 10;
    return ($value);   // $value + 1 or ($value + 1), E_NOTICE error is issued
}

$retRefValue =& retRef();
echo $retRefValue . PHP_EOL;  // 10

$retRefValue = 20;
$retRefValue1 =& retRef();
echo $retRefValue1 . PHP_EOL;  //10