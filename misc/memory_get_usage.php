<?php

echo memory_use_now() . PHP_EOL; 
$a = 1;
echo memory_use_now() . PHP_EOL;
$b = array();
for($i=0; $i<400000; $i++) $b[] = 1;
echo memory_use_now() . PHP_EOL;
$c = array();
for($i=0; $i<400000; $i++) $c[] = "a";
echo memory_use_now() . PHP_EOL;

function memory_use_now()
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