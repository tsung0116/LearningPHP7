<?php

use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;

/*
function __autoload($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/src/' . $directory . '.php';
    // $filename = __DIR__ . '\\src\\' . $classname . '.php';  //test for windows
    require_once($filename);
}
*/

spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'Bookstore\\';
    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
    // get the relative class name
    $relative_class = substr($class, $len);
    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // if the file exists, require it
    if (file_exists($file)) {
        require_once $file;
    }
});

function checkIfValid(Customer $customer, array $books): bool 
{
    return $customer->getAmountToBorrow() >= count($books);
}


$book1 = new Book("1984", "George Orwell", 9785267006323, 12);
//$customer1 = new Customer(5, 'John', 'Doe', 'johndoe@mail.com');

$basic1 = new Basic(-1, 'Timmy', 'Duncan', 'TD@mail.com');
$premium1 = new Premium(-1, 'Jeff', 'Woods', 'JW@mail.com');

$customer1 = new Basic(5, 'John', 'Doe', 'johndoe@mail.com');
var_dump(checkIfValid($customer1, [$book1])); // ok
// $customer2 = new Customer(7, 'James', 'Bond', 'james@bond.com');
// var_dump(checkIfValid($customer2, [$book1])); // fails