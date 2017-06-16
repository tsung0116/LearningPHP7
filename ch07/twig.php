<?php

require __DIR__ .'/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
$view = new Twig_Environment($loader);