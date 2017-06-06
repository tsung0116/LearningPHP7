<?php

namespace Bookstore\Utils;

use Bookstore\Exceptions\NotFoundException;

class Config 
{
    /* private $data;
    
    public function __construct() 
    {
        $json = file_get_contents(__DIR__ . '/../../config/app.json');
        $this->data = json_decode($json, true);
    }
    
    public function get($key) 
    {
        if (!isset($this->data[$key])) {
            throw new NotFoundException("Key $key not in config.");
        }
        return $this->data[$key];
    } */
    
    /* private static $data;
    
    public function __construct() 
    {
        $json = file_get_contents(__DIR__ . '/../../config/app.json');
        self::$data = json_decode($json, true);
    }
    
    public static function get($key) 
    {
        if (!isset(self::$data[$key])) {
            throw new NotFoundException("Key $key not in config.");
        }
        return self::$data[$key];
    } */
    
    private $data;
    private static $instance;

    private function __construct() 
    {
        $json = file_get_contents(__DIR__ . '/../../config/app.json');
        $this->data = json_decode($json, true);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function get($key) 
    {
        if (!isset($this->data[$key])) {
            throw new NotFoundException("Key $key not in config.");
        }
        return $this->data[$key];
    }
}