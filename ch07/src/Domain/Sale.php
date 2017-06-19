<?php

namespace Bookstore\Domain;

class Sale 
{
    private $books = [];

    public function getBooks(): array 
    {
        return $this->books;
    }

    public function addBook(int $bookId, int $amount = 1) {
        if (!isset($this->books[$bookId])) {
            $this->books[$bookId] = 0;
        }
        
        $this->books[$bookId] += $amount;
    }
}