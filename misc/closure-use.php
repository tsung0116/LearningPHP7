<?php

function func($val) 
{
    $foo = function () use (&$val) {
        $val++;
    };

    $foo();

    return $val;
}
  
echo(func(0));

// Result:
// 1