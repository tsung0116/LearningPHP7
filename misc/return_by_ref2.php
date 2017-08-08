<?php

class foo 
{
    private $value = 80;

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
$myRefValue = 30;                 // 

echo $obj->getValue() . PHP_EOL;       // output is 30
echo $myAssValue . PHP_EOL;       // output is 30