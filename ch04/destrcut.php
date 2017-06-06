<?php

class ConDestruct
{
    private static $aid = 0;
    private $uid; 
    public function __construct()
    {
        $this->uid = ++self::$aid;
        echo "Hi, an object is created" . " id = $this->uid" . PHP_EOL;
    }
    
    public function __destruct()
    {
        echo "Why destroy me!" . " id = $this->uid" . PHP_EOL;
    }
}

$o1 = new ConDestruct();
$o1 = new ConDestruct();
$o1 = new ConDestruct();
$o1 = new ConDestruct();
$o1 = new ConDestruct();
$o1 = new ConDestruct();
$o1 = new ConDestruct();