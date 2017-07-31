<?php

$str1 = "ABC";
$str2 = "ABCD";
$len = 3;

// string comparison of the first n characters
echo strncmp($str1, $str2, $len) . PHP_EOL; // 0

$str2 = "ACD";
echo strncmp($str1, $str2, $len) .PHP_EOL; // -1

echo strncmp($str2, $str1, $len) .PHP_EOL; // 1