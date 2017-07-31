<?php

$orders= file("test.txt");

$number_of_orders = count($orders);
if ($number_of_orders == 0) {
    echo "No orders pending." . PHP_EOL .
        "Please try again later." . PHP_EOL;
}

for ($i=0; $i<$number_of_orders; $i++) {
    echo $orders[$i] . PHP_EOL;
}

for ($i=0; $i<$number_of_orders; $i++) {
    //split up each line
    // Returns an array of strings, each of which is a substring of string formed by splitting it on boundaries formed by the string delimiter.
    $line = explode("\t", $orders[$i]);
    print_r($line);
    //You could extract numbers from these strings in a number of ways. Here, we used the function intval().
    $line[1] = intval($line[1]);
    $line[2] = intval($line[2]);
    $line[3] = intval($line[3]);
    print_r($line);
}    