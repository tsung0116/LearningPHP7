<?php

$mystring = 'abcad';
$findme   = 'a';
$pos = strpos($mystring, $findme);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) {
    echo "The string '$findme' was not found in the string '$mystring'" . PHP_EOL;
} else {
    echo "The string '$findme' was found in the string '$mystring'"
    . " and exists at position $pos" . PHP_EOL;
}

$className = 'testCase';
if (strpos($className, '\\') !== 0) {
    $className = '\\' . $className;
}
echo $className . PHP_EOL;

$className = $className . '\\Second';
$className = 'testCase\Second';
$className = '\Bookstore\\' . trim($className, '\\');
echo $className . PHP_EOL;

