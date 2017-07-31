<?php

function myClosure($hi) 
{
    return function($name) use ($hi) {
      return sprintf("%s, %s", $hi, $name);
    };
}
  
$foo = myClosure("Hello");
echo ($foo("World")), PHP_EOL;

var_dump(method_exists($foo,'__invoke'));
var_dump(method_exists($foo,'bindTo'));
var_dump(method_exists($foo,'call'));
// Result:
// Hello World


class A {
    function __construct($val) {
        $this->val = $val;
    }
    function getClosure() {
        //returns closure bound to this object and scope
        return function() { return $this->val; };
    }
}

$ob1 = new A(1);
$ob2 = new A(2);
$ob3 = new A(3);

$cl = $ob1->getClosure();
echo $cl(), "\n";          // 1
$cl = $cl->bindTo($ob2);   //newthis = $ob2
echo $cl(), "\n";          // 2
$cl = $cl->call($ob3);     // bind and call
echo $cl, "\n";     // 3