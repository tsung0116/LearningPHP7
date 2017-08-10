<?php

function memoryUseNow()
{
    $level = array('Bytes', 'KB', 'MB', 'GB');
    $n = memory_get_usage();
    for ($i=0, $max=count($level); $i<$max; $i++){
        if ($n < 1024){
            $n = round($n, 2);
            return "{$n} {$level[$i]}";
        }
        $n /= 1024;
    }
}

function squareArrayRef(&$array)
{
    foreach($array as $key => $val) {
        $array[$key] = $val * $val;
    }
} 

/* function squareArray($array)
{
    $square = [];
    foreach($array as $key => $val) {
        $square[$key] = $val * $val;
    }
    return $square;
} */

echo memoryUseNow() . PHP_EOL; 
for($i=0; $i<400000; $i++) $b[] = 8;
echo memoryUseNow() . PHP_EOL;

/* $numbersSquare = array_map(function ($number) {
return ($number * $number);
}, $b); */
// echo memoryUseNow() . PHP_EOL;
// $c = squareArray($b);
squareArrayRef($b);
echo memoryUseNow() . PHP_EOL;