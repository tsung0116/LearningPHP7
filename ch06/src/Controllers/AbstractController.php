<?php

namespace Bookstore\Controllers;

use Bookstore\Core\Config;
use Bookstore\Core\Db;
use Bookstore\Core\Request;
use Monolog\Logger;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Monolog\Handler\StreamHandler;
use Bookstore\Utils\DependencyInjector;

abstract class AbstractController 
{
    protected $di;
    protected $request;
    protected $db;
    protected $config;
    protected $view;
    protected $log;
    
    public function __construct(DependencyInjector $di, Request $request) 
    {
        $this->di = $di;
        $this->request = $request;

        $this->db = $di->get('PDO');
        $this->log = $di->get('Logger');
        $this->view = $di->get('Twig_Environment');
        $this->config = $di->get('Utils\Config');
        $this->customerId = $_COOKIE['id'];
    }

    public function setCustomerId(int $customerId) 
    {
        $this->customerId = $customerId;
    }

    protected function render(string $template, array $params): string 
    {
        return $this->view->loadTemplate($template)->render($params);
    }  
}