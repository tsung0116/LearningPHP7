<?php

namespace Bookstore\Domain;

class Customer 
{
    private static $lastId = 0;
    private $id;
    // typo in book, __set and __get are used
    // private $name; 
    private $firstname;
    private $surname;
    private $email;

    public function __construct
    (
        int $id,
        string $firstname,
        string $surname,
        string $email
    ){
        parent::__construct($firstname, $surname);
        if ($id < 0) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
        $this->email = $email;
    }

    public static function getLastId(): int 
    {
        return self::$lastId;
    }
    
    public function getId(): int 
    {
        return $this->id;
    }

    public function getFirstname(): string 
    {
        return $this->firstname;
    }
    
    public function getSurname(): string 
    {
        return $this->surname;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }    

    public function setEmail(string $email) 
    {
        $this->email = $email;
    }
    
    public function __set($name, $value) {}
}
