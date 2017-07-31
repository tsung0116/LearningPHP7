<?php

$array = array(1, 2, 3);

//yourfunction(value, key, userdata)

function my_print($value)
{
    echo "$value" . PHP_EOL;
}

function my_multiply(&$value, $key, $factor)  // passed by reference
{
    $value *= $factor;
}

array_walk($array, 'my_print');

array_walk($array, 'my_multiply', 3);
print_r($array);
