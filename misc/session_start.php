<?php

//session_start();

//session_start(['use_cookies' => 0]);

session_start(['cookie_lifetime' => 86400, 'read_and_close'  => true]);

print_r($_SESSION);

$arr =[];
print_r($arr);