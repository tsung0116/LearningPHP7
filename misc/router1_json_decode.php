<?php

$json = file_get_contents('routes.json');
$routeMap = json_decode($json, true);
print_r($routeMap);

$routeMap2 = ["books/:page" => ["controller" => "Book", "method" => "getAllWithPage", "params" => ["page" => "number"]]];
print_r($routeMap2);

foreach ($routeMap as $route => $info) {
    echo "route: "; 
    var_dump($route);
    echo "info: " ;
    var_dump($info);
}    