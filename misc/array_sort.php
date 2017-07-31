<?php

$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);
sort($prices);
print_r($prices);

$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);
asort($prices);
print_r($prices);

$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);
ksort($prices);
print_r($prices);

//The descending order versions are called rsort(), arsort(), and krsort().

$products = array(array('TIR', 'Tires', 100),
    array('OIL', 'Oil', 10),
    array('SPK', 'Spark Plugs', 4));
array_multisort($products);    
print_r($products);

function compare($x, $y) 
{
    return $x[2] <=> $y[2];          //spaceship operator
    /* if ($x[2] == $y[2]) {
        return 0;
    } else if ($x[2] < $y[2]) {
        return -1;
    } else {
        return 1;
    } */
}

usort($products, 'compare');
print_r($products);

// The uasort() and uksort() versions of asort and ksort also require user-defined comparison functions.

$numbers = range(1,10);
//$numbers = range(10, 1, -1);
$numbers = array_reverse($numbers);

$numbers = array();
for($i=10; $i>0; $i--) {
    array_push($numbers, $i);
}

