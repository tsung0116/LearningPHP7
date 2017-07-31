<?php

class ClassName
{
    private $attribute;
    // var $attribute;

    function __get($name)
    {
        return $this->$name;
    }

    function __set ($name, $value)
    {
        $this->$name = $value;
    }
}

$a = new ClassName();

$a->newAttri = 10;

echo $a->newAttri . PHP_EOL;

print_r(get_object_vars($a));