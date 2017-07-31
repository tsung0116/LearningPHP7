<?php

$dbConfig =['host' => 'localhost', 'port' => 3306, 'dbname' => 'test', 'charset' => 'UTF8'];

$dsn = sprintf("mysql:host=%s; port=%s; dbname=%s; charset=%s",
    $dbConfig['host'], $dbConfig['port'], $dbConfig['dbname'], $dbConfig['charset']);

echo $dsn . PHP_EOL;

//$dsn = "mysql:host=$dbConfig['host']; port=$dbConfig['port']; dbname=$dbConfig['dbname']; charset=$dbConfig['charset']";

//echo $dsn . PHP_EOL;