<?php

$baz = 15;

function foo(&$var)
{
    $var =& $GLOBALS["baz"];
}
foo($bar); 
var_dump($bar); // NULL