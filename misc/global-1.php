<?php

global $var;

if (isset($var))
   echo "var is set" . PHP_EOL;
else
   echo "var is not set" . PHP_EOL; //

$var;
 
if (isset($var))
   echo "var is set" . PHP_EOL;
else
   echo "var is not set" . PHP_EOL;  //

$var = null;

if (isset($var))
   echo "var is set" . PHP_EOL;
else
   echo "var is not set" . PHP_EOL; //