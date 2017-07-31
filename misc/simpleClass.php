<?php

class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    function __construct()
    {
        echo "Object created!" . PHP_EOL;
    }
    
    function __destruct()
    {
        echo "Object destroyed!" . PHP_EOL;
    }
    
    function __clone()
    {
        echo "Object cloned!" . PHP_EOL;
    }
    
    
    // method declaration
    public function displayVar() 
    {
        echo $this->var;
    }
}

$inst = new SimpleClass();

// This can also be done with a variable:
$className = 'SimpleClass';
$instance = new $className(); // new SimpleClass()

$assigned   =  $instance;
$reference  =& $instance;

$instance->var = '$assigned will have this value';

$instance = null; // $instance and $reference become null

var_dump($instance);
var_dump($reference);
var_dump($assigned);