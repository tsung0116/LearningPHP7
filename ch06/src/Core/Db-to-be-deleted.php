<?php

namespace Bookstore\Core;

use PDO;

class Db 
{
    private static $instance;
    
    private static function connect(): PDO 
    {
        $dbConfig = Config::getInstance()->get('db');
        $dsn = sprintf("mysql:host=%s; port=%s; dbname=%s; charset=%s",
            $dbConfig['host'], $dbConfig['port'], $dbConfig['dbname'], $dbConfig['charset']);
        return new PDO($dsn, $dbConfig['user'], $dbConfig['password']);
    }    

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = self::connect();
        }
        return self::$instance;
    }
}

// require 'Config.php';
// $db = Db::getInstance();