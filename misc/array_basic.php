<?php

$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);

foreach ($prices as $key => $value) {
    echo $key . " - " . $value . PHP_EOL;
}

while ($element = each($prices)) {      // Return the current key and value pair from an array and advance the array cursor    
    echo $element['key'] . " - " . $element['value'] . PHP_EOL;
    print_r($element);
}

/* first elemet produced by each() is an array where $element[0] ($element[key]) is the associative index, and  $element[1] ($element[value]) is the value.
Array
(
    [1] => 100
    [value] => 100
    [0] => Tires
    [key] => Tires
)
*/

reset($prices);
while (list($product, $price) = each($prices)) {
    echo $product . " - " . $price . PHP_EOL;
}

$arr = ['Tires' => 1, 3, 5, 7, 9, 11, 13, 'Spark Plugs' => 15];
print_r($arr);

// list($a, $b, $c, $d, $e, $f, $g, $h) = $arr;    //list() only works on numerical indices and assumes the numerical indices start at 0.
list($a, $b, $c, $d, $e, $f) = $arr;
echo $a . " - " . $b . " - " . $c . " - " . $d . " - " . $e . " - " . $f . PHP_EOL;

// Since PHP 7.1, keys can be specified
list('Spark Plugs' => $g, 'Tires' => $h) = $arr;
echo "Spark Plugs = " . $g . " and  Tires = " . $h . PHP_EOL;

$arr2 = ['Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 7];  //any key clashes are not added

$arr = $arr + $arr2;

print_r($arr);

$arr3[1] = 'a';
$arr3[0] = 'b';
print_r($arr3);

function changeArrayKey($array, $oldKey, $newKey)
{
    $ret = array();
    foreach ($array as $key => $value) {
        if ($key === $oldKey)
            $ret[$newKey] = $value;
        else
            $ret[$key] = $value;
    }
    return $ret;
}

$arr = changeArrayKey($arr, 6, 'NewKey');
print_r($arr);

function swapArrayKey($array, $key1, $key2) 
{
    $ret = array();
    foreach ($array as $key => $value) {
        if ($key === $key1) {
            $ret[$key2] = $array[$key1];
        } else if ($key === $key2) {
            $ret[$key1] = $array[$key2];
        } else {
            $ret[$key] = $value;
        }
    }
    return $ret;
}

$theirName = array(
 //   Key   =>  Value
    'Jim'   => 'dad', 
    'Josh'  => 'son', 
    'Jamie' => 'mom', 
    'Jane'  => 'daughter', 
    'Jill'  => 'daughter'
);

$theirName = swapArrayKey($theirName, 'Josh', 'Jane');
print_r($theirName);

$a = [1, 2, 3];
$b = [1, '2', 3];

if ($a == $b)
    echo "Equl" .PHP_EOL;
else
    echo "Not Equl" . PHP_EOL;

if ($a === $b)
    echo "Identical" .PHP_EOL;
else
    echo "Not Identical" . PHP_EOL;

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
