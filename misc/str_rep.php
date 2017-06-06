<?php

$regexPatters = ['number' => '\d+', 'string' => '\w'];

$name = 'page';
$type = 'number';
$route = 'books\/:page';
$path = 'books/50';

$regexRoute = str_replace(':' . $name, $regexPatters[$type], $route);

echo $regexRoute;
echo PHP_EOL;

$match = preg_match("@^/$regexRoute$@", 'books/50');
echo $match;
echo PHP_EOL;

$match1 = preg_match("@^books\/\d+@", 'books/50');
echo $match1;