<?php

use Bookstore\Domain\{Book, Customer};
use Bookstore\Domain\Customer\{Basic, Premium, CustomerFactory};
use Bookstore\Domain\{Payer, Person};
use Bookstore\Utils\Unique;
use Bookstore\Exceptions\{InvalidIdException, ExceededMaxAllowedException};
use Bookstore\Utils\Config;

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
    $base_dir = __DIR__ . '/src-inf/';
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

function processPayment(Payer $payer, float $amount) 
{
    if ($payer->isExtentOfTaxes()) {
        echo "What a lucky one..." . PHP_EOL;
    } else {
        $amount *= 1.16;
    }

    $payer->pay($amount);
}

function createBasicCustomer($id)
{
    try {
        echo "\nTrying to create a new customer.\n";
        return new Basic($id, "name", "surname", "email");
    } catch (InvalidIdException $e) {
        echo "You cannot provide a negative id.\n";
    } catch (ExceededMaxAllowedException $e) {
        echo "No more customers are allowed.\n";
    } catch (Exception $e) {
        echo "Unknown exception: " . $e->getMessage();
    } finally {
        echo "\nEnd of function.\n";
    }
}

/* $book1 = new Book("1984", "George Orwell", 9785267006323, 12);
//$customer1 = new Customer(5, 'John', 'Doe', 'johndoe@mail.com');

$basic1 = new Basic(0, 'Timmy', 'Duncan', 'TD@mail.com');
$premium1 = new Premium(0, 'Jeff', 'Woods', 'JW@mail.com');

$customer1 = new Basic(5, 'John', 'Doe', 'johndoe@mail.com');
var_dump(checkIfValid($customer1, [$book1])); // ok
$customer2 = new Premium(7, 'James', 'Bond', 'james@bond.com');
var_dump(checkIfValid($customer2, [$book1]));

print_r($customer1); 

var_dump($customer1 instanceof Basic); // true
var_dump($customer1 instanceof Premium); // false
var_dump($customer2 instanceof Basic); // false
var_dump($customer2 instanceof Premium); // true
var_dump($customer1 instanceof Payer); // true
var_dump($customer1 instanceof Customer); // true
var_dump($customer1 instanceof Person); // true


var_dump($customer1->getMonthlyFee());

processPayment($customer1, 100);
processPayment($customer2, 100);

$basic1 = new Basic(11, "name", "surname", "email");
// $basic2 = new Basic(-1, "name", "surname", "email");
var_dump($basic1->getId()); // 11
// var_dump($basic2->getId()); // 12 */

/* try {
    $basic = new Basic(-1, "name", "surname", "email");
} catch (Exception $e) {
    echo 'Something happened when creating the basic customer: '
        . $e->getMessage();
} */


/* createBasicCustomer(1);
createBasicCustomer(-1);
createBasicCustomer(51); */

CustomerFactory::factory('basic', 2, 'mary', 'poppins', 'mary@poppins.com');
CustomerFactory::factory('premium', 0, 'james', 'bond', 'james@bond.com');

/* $config = new Config();
$dbConfig = $config->get('db');
var_dump($dbConfig); */

$config = Config::getInstance();
$dbConfig = $config->get('db');
var_dump($dbConfig);