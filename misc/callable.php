<?php

$myCallback = function () {
    echo 'World';
};


function sayHello(callable $callback) 
{
    echo 'Hello ';
    call_user_func($callback);
}

sayHello($myCallback);
