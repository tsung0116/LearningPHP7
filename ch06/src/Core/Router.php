<?php

namespace Bookstore\Core;

use Bookstore\Controllers\{ErrorController, CustomerController};

class Router 
{
    private $di;
    private $routeMap;
    private static $regexPatters = ['number' => '\d+', 'string' => '\w'];

    // routeMap = ["books/:page" => ["controller" => "Book", "method" => "getAllWithPage", 
    // "params" => ["page" => "number"]], "books" => [...], ...]
    public function __construct(DependencyInjector $di) 
    {
        $this->di = $di;
        $json = file_get_contents(__DIR__ . '/../../config/routes.json');
        $this->routeMap = json_decode($json, true);
    }

    public function route(Request $request): string 
    {
        $path = $request->getPath();
        foreach ($this->routeMap as $route => $info) {
            // if $route = 'books/:page', 
            // $info = ["controller" => "Book", "method" => "getAllWithPage", "params" => ["page" => "number"]]
            // we have $regexRoute = books/\d+            
            $regexRoute = $this->getRegexRoute($route, $info);
            // preg_match("@^/$regexRoute$@", $path) ???, we don't need the slash ?? -->/login
            if (preg_match("@^/$regexRoute$@", $path)) {                
                return $this->executeController($route, $path, $info, $request);                
            }
        }
        
        $errorController = new ErrorController($this->di, $request);        
        return $errorController->notFound();
    }
    
    private function getRegexRoute(string $route, array $info): string 
    {
        if (isset($info['params'])) {
            foreach ($info['params'] as $name => $type) {
                $route = str_replace(':' . $name, self::$regexPatters[$type], $route);
            }
        }
        return $route;
    }
    
    // if we had the route /books/:id/borrow and the path /books/12/borrow, 
    // the result of this method would be the array [‘id’ => 12].
    private function extractParams(string $route, string $path): array 
    {
        $params = [];
        $pathParts = explode('/', $path);
        $routeParts = explode('/', $route);
        foreach ($routeParts as $key => $routePart) {
            if (strpos($routePart, ':') === 0) {
                $name = substr($routePart, 1);
                $params[$name] = $pathParts[$key+1];
            }
        }
        return $params;
    }
    
    private function executeController(
        string $route,
        string $path,
        array $info,
        Request $request
    ): string 
    {
        $controllerName = '\Bookstore\Controllers\\' 
            . $info['controller'] . 'Controller';
        $controller = new $controllerName($this->di, $request);        
        if (isset($info['login']) && $info['login']) {
            if ($request->getCookies()->has('user')) {
                $customerId = $request->getCookies()->get('user');
                $controller->setCustomerId($customerId);
            } else {
                $errorController = new CustomerController($this->di, $request);                
                return $errorController->login();
            }
        }        
        $params = $this->extractParams($route, $path);
        // given an object, a method name, and the arguments for the method, 
        // invokes the method of the object passing the arguments.       
        return call_user_func_array([$controller, $info['method']], $params);
    }
}