<?php

class foo 
{
    public $value = 42;

    public function &getValue() 
    {
        return $this->value;
    }
}

$obj = new foo;
$myValue = &$obj->getValue(); // $myValue is a reference to $obj->value, which is 42.
$myValue1 = $obj->getValue();
$obj->value = 2;
echo $myValue . PHP_EOL;
echo $myValue1 . PHP_EOL;   