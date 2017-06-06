<?php

namespace Bookstore\Domain;

abstract class Customer extends Person
{
    private static $lastId = 0;
    private $id;    
    private $email;

    public function __construct
    (
        int $id,
        string $firstname,
        string $surname,
        string $email
    ){
        // $id === null cannot be used since $id is an integer in the parameter list
        if ($id < 0) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
    }

    abstract public function getMonthlyFee();
    abstract public function getAmountToBorrow();
    abstract public function getType();
    
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
}
