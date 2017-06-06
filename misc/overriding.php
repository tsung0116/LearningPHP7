<?php

class Pops 
{
    public function sayHi() 
    {
        echo "Hi, I am pops.";
    }
}

class Child extends Pops
{
    public function sayHi() 
    {
        echo "Hi, I am a child.";
        parent::sayHi();
    }
}

$pops = new Pops();
$child = new Child();
echo $pops->sayHi() . PHP_EOL; // Hi, I am pops.
echo $child->sayHi() . PHP_EOL; // Hi, I am Child.