<?php

$fileDir = dirname(__FILE__);
$parentDir = dirname(dirname(__FILE__));
$baseDir = dirname($parentDir);

// __DIR__ only exists with PHP >= 5.3
// __DIR__ is evaluated at compile-time, while dirname(__FILE__) means a function-call and is evaluated at execution-time
// so, __DIR__ is (or, should be) faster.

echo __DIR__ . PHP_EOL;
echo $fileDir . PHP_EOL;
echo $parentDir . PHP_EOL;
echo $baseDir . PHP_EOL;