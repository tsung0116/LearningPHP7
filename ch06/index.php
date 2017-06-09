<?php

use Bookstore\Core\Router;
use Bookstore\Core\Request;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$router = new Router();
$response = $router->route(new Request());
echo $response;