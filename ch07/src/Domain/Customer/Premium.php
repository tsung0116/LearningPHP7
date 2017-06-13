<?php

namespace Bookstore\Domain\Customer;

use Bookstore\Domain\Customer;
use Bookstore\Domain\Person;
use Bookstore\Domain\Payer;

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
        echo "Paying $amount." . PHP_EOL;
    }

    public function isExtentOfTaxes(): bool 
    {
        return true;
    }
}