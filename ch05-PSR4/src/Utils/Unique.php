<?php

namespace Bookstore\Utils;

use Bookstore\Exceptions\{InvalidIdException, ExceededMaxAllowedException};

trait Unique 
{
    private static $lastId = 0;
    protected $id;

    public function setId(int $id) 
    {
        //try {
            if ($id < 0) {
                //throw new \Exception('Id cannot be negative.');
                throw new InvalidIdException('Id cannot be a negative number. invalid');
            }
            if ($id == 0) {
                $this->id = ++self::$lastId;
            } else {
                $this->id = $id;
                if ($id > self::$lastId) {
                    self::$lastId = $id;
                }
            }
            if ($this->id > 50) {
                throw new ExceededMaxAllowedException('Max number of users is 50.');
            }
        //} catch (\Exception $e) {
        //    echo $e->getMessage() . PHP_EOL;
        //}
    }

    public static function getLastId(): int 
    {
        return self::$lastId;
    }

    public function getId(): int 
    {
        return $this->id;
    }
}