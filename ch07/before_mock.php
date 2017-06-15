<?php

require_once __DIR__ .'/vendor/autoload.php';

class Book1 
{
}

$className = 'Models\BookModel';

if (strpos($className, '\\') !== 0) {
    $className = '\\' . $className;
}
        
if (!class_exists($className)) {
    $className = '\Bookstore\\' . trim($className, '\\');
    if (!class_exists($className)) {
        echo "Class $className not found." . PHP_EOL;
    }
}
        
echo $className . PHP_EOL;