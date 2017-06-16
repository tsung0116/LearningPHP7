<?php

namespace My\Test;

class Hello
{
    public static function checkClass($className)
    {
        if (strpos($className, '\\') !== 0) {
            $className = '\\' . $className;
        }
        
        if (!class_exists($className)) {
            echo "first check failed" . PHP_EOL;
            $className = '\Bookstore\\' . trim($className, '\\');
            if (!class_exists($className)) {
                throw new InvalidArgumentException("Class $className not found.");
            }
        }
    }    
}

echo Hello::class;  // My\Test\Hello

Hello::checkClass(Hello::class);    