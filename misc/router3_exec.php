<?php

namespace Bookstore\Controllers;

require 'BookController.php';

$controllerName = '\Bookstore\Controllers\\' . 'Book' . 'Controller';

echo $controllerName . PHP_EOL;

$controller = new $controllerName();