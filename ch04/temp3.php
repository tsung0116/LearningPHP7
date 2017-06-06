<?php

class Premium extends Person implements Customer, Payer
{
    public function getMonthlyFee(): float 
    {
        return 10.0;
    }    

    public function getAmountToBorrow(): int 
    {
        return 10;
    }

    public function getType(): string 
    {
        return 'Premium';
    }
    
    public function pay(float $amount) 
    {
        echo "Paying $amount.";
    }

    public function isExtentOfTaxes(): bool 
    {
        return true;
    }
}

class Basic extends Person implements Customer, Payer 
{
    public function getMonthlyFee(): float 
    {
        return 5.0;
    }

    public function getAmountToBorrow(): int 
    {
        return 3;
    }

    public function getType(): string 
    {
        return 'Basic';
    }
    
    public function pay(float $amount) 
    {
        echo "Paying $amount.";
    }

    public function isExtentOfTaxes(): bool 
    {
        return false;
    }
}

interface Payer {
    public function pay(float $amount);
    public function isExtentOfTaxes(): bool;
}

interface Customer 
{
    public function getMonthlyFee(): float;
    public function getAmountToBorrow(): int;
    public function getType(): string;
}

class Person 
{
    private static $lastId = 0;
    protected $id;
    protected $firstname;
    protected $surname;
    protected $email;

    public function __construct
    (
        int $id,
        string $firstname,
        string $surname,
        string $email
    ) {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        
        if (empty($id)) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
    }
    

    public function getFirstname(): string 
    {
        return $this->firstname;
    }

    public function getSurname(): string 
    {
        return $this->surname;
    }

    public static function getLastId(): int 
    {
        return self::$lastId;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }
}

$customer1 = new Basic(5, 'John', 'Doe', 'johndoe@mail.com');
$customer2 = new Premium(7, 'James', 'Bond', 'james@bond.com');

print_r($customer1); 

var_dump($customer1 instanceof Basic); // true
var_dump($customer1 instanceof Premium); // false
var_dump($customer2 instanceof Basic); // false
var_dump($customer2 instanceof Premium); // true
var_dump($customer1 instanceof Payer); // true
var_dump($customer1 instanceof Customer); // true
var_dump($customer1 instanceof Person); // true

var_dump($customer1->getMonthlyFee());