<?php

use Bookstore\Domain\{Book, Customer};
use Bookstore\Domain\Customer\{Basic, Premium, CustomerFactory};
use Bookstore\Domain\{Payer, Person};
use Bookstore\Utils\{Unique, Config};
use Bookstore\Exceptions\{InvalidIdException, ExceededMaxAllowedException};

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

CustomerFactory::factory('basic', 2, 'mary', 'poppins', 'mary@poppins.com');
CustomerFactory::factory('premium', 0, 'james', 'bond', 'james@bond.com');

$config = Config::getInstance();
$dbConfig = $config->get('db');
var_dump($dbConfig);