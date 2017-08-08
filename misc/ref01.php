<?php

$a = 10;
$b =& $a;
$b = 20;
echo $a . PHP_EOL; // 20
$a = 15;
echo $b . PHP_EOL; // 15

// no nested
$c = 30;
$b =& $c;
echo $a . PHP_EOL; // 15
echo $b . PHP_EOL; // 30

unset($c);
// echo $b . PHP_EOL; // 
echo $b . PHP_EOL; // 30

// 
$b =& $a;
$d = $b;
$b = 5;
echo $d . PHP_EOL; // 15


// unset($a);
// unset($b);
// unset($c);
function foo(&$var) { }

foo($f); // $a is "created" and assigned to null

$g = array();
foo($g['g']);
var_dump(array_key_exists('g', $g)); // bool(true)

$h = new StdClass;
foo($h->i);
var_dump(property_exists($h, 'i')); // bool(true)



// global 
$bar = 10;
$baz = 15;
$qux = 30;

function foo1()
{
    global $bar, $baz, $qux;
    $quux = 45;
    $bar =&amp; $quux;
    $baz =&amp; $qux;
    $baz = 100;
}
foo1(); 
echo $bar . PHP_EOL; // 10
echo $baz . PHP_EOL; // 15
echo $qux . PHP_EOL; // 100





//
$var1 = "Example variable";
$var2 = "";

function global_references($use_globals)
{
    // global $var1, $var2;
    $var1 =& $GLOBALS['var1'];
    $var2 =& $GLOBALS['var2'];
    
    if (!$use_globals) {
        $var2 =& $var1; // visible only inside the function
    } else {
        $GLOBALS["var2"] =& $var1; // visible also in global context
    }
}

global_references(false);
echo "var2 is set to '$var2'\n"; // var2 is set to ''
global_references(true);
echo "var2 is set to '$var2'\n"; // var2 is set to 'Example variable'


//
$ref = 0;
$row =& $ref;
foreach (array(1, 2, 3) as $row) {
    // do something
}
echo $ref . PHP_EOL; // 3 - last element of the iterated array


//
unset($a);
unset($b);
$a = 1;
$b = array(2, 3);
$arr = array(&$a, &$b[0], &$b[1]);
//$arr = [&$a, &$b[0], &$b[1]];
$arr[0]++; $arr[1]++; $arr[2]++;
/* $a == 2, $b == array(3, 4); */
echo $a . PHP_EOL;
print_r($b);

/* Assignment of array variables */
$arr = array(1);
//$l =& $arr[0]; //$l and $arr[0] are in the same reference set
$arr2 = $arr; //not an assignment-by-reference!
$arr2[0]++;
/* $l == 2, $arr == array(2) */
/* The contents of $arr are changed even though it's not a reference! */
//echo $l . PHP_EOL;
print_r($arr);