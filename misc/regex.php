<?php

// Backreferences
$re1 = '/^([a-z]+) \1 black sheep/';

$match1 = preg_match($re1, 'baa baa black sheep');
echo $match1 . PHP_EOL;

$match1 = preg_match($re1, 'blah baa black sheep');
echo $match1 . PHP_EOL;

$match1 = preg_match('/^([a-z]+) \1 black sheep/', 'baa baa baa black sheep');
echo $match1 . PHP_EOL;

$re2 = '/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/';
$match1 = preg_match($re2, 'te-s.t@123.45-6.com', $mathced, PREG_OFFSET_CAPTURE);
echo $match1 . PHP_EOL;
print_r($mathced);