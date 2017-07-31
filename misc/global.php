<?php

// wrong example
// You can also use the global keyword at the top of a script 
// when a variable is first used to declare that it should be in scope throughout the script. 
// This is possibly a more common use of the global keyword.

global $newLine;

if($_SERVER['DOCUMENT_ROOT']){
    $newLine = "<br>";
} else {
    $newLine = PHP_EOL;
}

function var_args() 
{    
    echo 'Number of parameters:' . func_num_args() . $newLine;  
    
    $args = func_get_args();
    
    foreach ($args as $arg) {
        echo $arg . $newLine;
    }
}

$arr = "hi";
var_args(1,'test', $arr);