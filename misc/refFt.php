<?php

$bar = 10;
$baz = 15;

function foo()
{
    global $bar, $baz;
    $bar =& $baz;
    $bar = 100;
}
foo(); 
echo $bar . PHP_EOL; // 10
echo $baz . PHP_EOL; // 100


$var1 = "Example variable";
$var2 = "";

function global_references($use_globals)
{
    global $var1, $var2;
    if (!$use_globals) {
        $var2 =& $var1; // visible only inside the function
        $var2 = "Hello";
    } else {
        $GLOBALS["var2"] =& $var1; // visible also in global context
    }
}

global_references(false);
echo "var1 is set to '$var1'\n"; // var1 is set to 'Hello'
//global_references(true);
echo "var2 is set to '$var2'\n"; // var2 is set to ''