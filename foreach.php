<?php
$names = ['Harry', 'Ron', 'Hermione'];
echo "<pre>";
foreach ($names as $name) {
    echo $name . PHP_EOL;
} 
foreach ($names as $key => $name) {
    echo $key . " -> " . $name . PHP_EOL;
}
echo "</pre>";
