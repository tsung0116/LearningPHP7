<?php

if($_SERVER['DOCUMENT_ROOT']){
    $newLine = "<br>";
} else {
    $newLine = PHP_EOL;
}
    
function my_function() 
{
?>

My function was called

<?php
}
?>

<?php

function var_args() 
{
    global $newLine;
    echo 'Number of parameters:' . func_num_args() . $newLine;  
    
    $args = func_get_args();
    
    foreach ($args as $arg) {
        echo $arg . $newLine;
    }
}

$arr = "hi";
var_args(1,'test', $arr);

function fn() 
{
    global $newLine;
    echo 'inside the function, at first $var = ' . $var . $newLine;
    $var = 2;
    global $var;
    echo 'then, inside the function, $var = ' . $var . $newLine;
}
$var = 1;
fn();
echo 'outside the function, $var = ' . $var . $newLine;

function larger($x, $y)
{
    global $newLine;
    if ((!isset($x)) || (!isset($y))) {
        echo "This function requires two numbers.";
        return;
    }
    if ($x >= $y) {
        echo $x . $newLine;
    } else {
        echo $y . $newLine;
    }
}

larger($d, 10);