<?php

use Bookstore\Core\{Router, Request, Config};
use Bookstore\Models\BookModel;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Bookstore\Utils\DependencyInjector;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$config = new Config();
$dbConfig = $config->get('db');
$dsn = sprintf("mysql:host=%s; port=%s; dbname=%s; charset=%s",
            $dbConfig['host'], $dbConfig['port'], $dbConfig['dbname'], $dbConfig['charset']);
$db = new PDO($dsn, $dbConfig['user'], $dbConfig['password']);

$loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
$view = new Twig_Environment($loader);
$log = new Logger('bookstore');
$logFile = $config->get('log');
$log->pushHandler(new StreamHandler($logFile, Logger::DEBUG));
$di = new DependencyInjector();
$di->set('PDO', $db);
$di->set('Utils\Config', $config);
$di->set('Twig_Environment', $view);
$di->set('Logger', $log);
$di->set('BookModel', new BookModel($di->get('PDO')));
$router = new Router($di);

$response = $router->route(new Request());
echo $response;