<?php

class foo 
{
    private $value = 80;

    public function &getValue() 
    {
        return ($this->value);
    }

    public function setValue($input)
    {
        $this->value = $input;
    }
}

$obj = new foo;
$myRefValue =& $obj->getValue();  // $myValue is a reference to $obj->value
$myAssValue = $obj->getValue();   // 80 is assigned to $myAssValue 
echo $myRefValue . PHP_EOL;       // 80
echo $myAssValue . PHP_EOL;       // 80
$obj->setValue(20);
echo $myRefValue . PHP_EOL;       // 20
echo $myAssValue . PHP_EOL;       // 80
$myRefValue = 30;                  
echo $obj->getValue() . PHP_EOL;  //30 