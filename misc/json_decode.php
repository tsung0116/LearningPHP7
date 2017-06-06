<?php

$json = file_get_contents('routes.json');
$routeMap = json_decode($json, true);

print_r($routeMap);

foreach ($routeMap as $route => $info) {
    echo "route: "; 
    var_dump($route);
    echo "info: " ;
    var_dump($info);
}    