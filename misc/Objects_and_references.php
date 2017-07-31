<?php

// A PHP reference is an alias, which allows two different variables to write to the same value.
// As of PHP 5, an object variable doesn't contain the object itself as value anymore. 
// It only contains an object identifier which allows object accessors to find the actual object. 
// When an object is sent by argument, returned or assigned to another variable, the different variables are not aliases: 
// they hold a copy of the identifier, which points to the same object.

// Since PHP 5, new returns a reference automatically.

class A 
{
    public $foo = 1;
}  

$a = new A;
$b = $a;     // $a and $b are copies of the same identifier
             // ($a) = ($b) = <id> (class A#1)

// var_dump($a);
// var_dump($b);             
$b->foo = 2;
echo $a->foo."\n";  //2
// var_dump($a);
// var_dump($b); 

$c = new A;
$d = &$c;    // $c and $d are references
             // ($c,$d) = <id> (class A#2)

// var_dump($c);
// var_dump($d);
$d->foo = 2;
echo $c->foo."\n";  //2

$c = &$a;     //($a, $c) = <id> (class A#1); ($d) = <id> (class A#2)
// var_dump($c);
// var_dump($d);

$c = new A;   //($a, $c) = <id> (class A#3); ($b) = <id> (class A#1); ($d) = <id> (class A#2)
// var_dump($a);
// var_dump($b);
// var_dump($c);
// var_dump($d);

$e = new A;

var_dump($e);

function foo($obj) 
{    
    $obj->foo = 2;
}

foo($e);  // ($obj) = ($e) = <id>  (class A#4)
echo $e->foo."\n";  //2

$f = clone $e;  // $f = <id> (class A#5)
var_dump($f);