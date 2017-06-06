<?php

use Bookstore\Domain\Customer;

require_once __DIR__ . '/Customer.php';

$customer1 = new Customer(3, 'John', 'Doe', 'johndoe@mail.com');
echo Customer::getLastId() . PHP_EOL;
echo $customer1->getFirstname() . PHP_EOL;
$customer2 = new Customer(-1, 'Mary', 'Poppins', 'mp@mail.com');
echo Customer::getLastId() . PHP_EOL;
echo $customer2->getFirstname() . PHP_EOL;
$customer3 = new Customer(7, 'James', 'Bond', '007@mail.com');
echo Customer::getLastId() . PHP_EOL;
echo $customer3->getFirstname() . PHP_EOL;