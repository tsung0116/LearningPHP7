<?php

namespace Bookstore\Tests\Domain;

use Bookstore\Domain\Sale;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../vendor/autoload.php';

class SaleTest extends TestCase 
{
    public function testCanCreate() 
    {
        $sale = new Sale();
    }

    public function testWhenCreatedBookListIsEmpty() 
    {
        $sale = new Sale();
        $this->assertEmpty($sale->getBooks());
    }

    public function testWhenAddingABookIGetOneBook() 
    {
        $sale = new Sale();
        $sale->addBook(123);
        $this->assertSame($sale->getBooks(), [123 => 1]);
    }

    public function testSpecifyAmountBooks() 
    {
        $sale = new Sale();
        $sale->addBook(123, 5);
        $this->assertSame($sale->getBooks(), [123 => 5]);
    }

    public function testAddMultipleTimesSameBook() 
    {
        $sale = new Sale();
        $sale->addBook(123, 5);
        $sale->addBook(123);
        $sale->addBook(123, 5);
        $this->assertSame($sale->getBooks(), [123 => 11]);
    }

    public function testAddDifferentBooks() 
    {
        $sale = new Sale();
        $sale->addBook(123, 5);
        $sale->addBook(456, 2);
        $sale->addBook(789, 5);
        $this->assertSame($sale->getBooks(), [123 => 5, 456 => 2, 789 => 5]);
    }
}