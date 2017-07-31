<?php

// Works as of PHP 5.3.0
const CONSTANT = 'Hello World';

echo CONSTANT . PHP_EOL;

// Works as of PHP 5.6.0
const ANOTHER_CONST = CONSTANT . '; Goodbye World';
echo ANOTHER_CONST . PHP_EOL;  //outputs "Hello World; Goodbye World"

const ANIMALS = array('dog', 'cat', 'bird');
echo ANIMALS[1] . PHP_EOL; // outputs "cat"

// Works as of PHP 7
define('ANIMALS2', array(
    'dog',
    'cat',
    'bird'
));
echo ANIMALS2[1] . PHP_EOL; // outputs "cat"

$constArray = get_defined_constants(true);
print_r($constArray['user']);