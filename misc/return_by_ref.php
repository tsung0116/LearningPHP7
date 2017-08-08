<?php

class foo 
{
    public $value = 80;

    public function &getValue() 
    {
        return $this->value;
    }
}

$obj = new foo;
$myRefValue = &$obj->getValue();  // $myValue is a reference to $obj->value, which is 80.
$myAssValue = $obj->getValue();   // 80 is assigned to $myAssValue 
echo $myRefValue . PHP_EOL;       // output is 80
echo $myAssValue . PHP_EOL;       // output is 80
$obj->value = 20;                 // 20 is assigned to $obj->value
echo $myRefValue . PHP_EOL;       // $myValue is a reference to $obj->value, which is 20.
echo $myAssValue . PHP_EOL;       // no change for $myAssValue
$myRefValue = 30;                 // 
$myAssValue = $obj->getValue();   //
echo $obj->value . PHP_EOL;       // output is 30
echo $myAssValue . PHP_EOL;       // output is 30
$int = 50;
$myRefValue = &$int;              // $myValue is now a reference to $int
echo $myRefValue . PHP_EOL;       // output is 50
echo $obj->value . PHP_EOL;       // output is 30 

$obj2 = new foo;
$myRefValue = &$obj2->getValue();
echo $myRefValue . PHP_EOL;       // output is 80