<?php

$products = array(array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
    array('Code' => 'OIL', 'Description' => 'Oil', 'Price' => 10),
    array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' =>4)
);

for ($row = 0; $row < 3; $row++){
    while (list($key, $value) = each($products[$row])) {
        echo ' | ' . $value;
    }
    echo ' | ' . PHP_EOL;
}