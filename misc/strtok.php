<?php

$string = "This is\tan example\nstring";

/* Use tab and newline as tokenizing characters as well  */

$tok = strtok($string, " \n\t");

while ($tok !== false) {
    echo "Word = $tok" . PHP_EOL;
    $tok = strtok(" \n\t");
}

// behavior on empty part found
$first_token  = strtok('/something', '/');
$second_token = strtok('/');
var_dump($first_token, $second_token);

$test = 'Your customer service is excellent';

$substr = substr($test, 5, -13);
echo $substr . PHP_EOL; // "customer service"

$result = strpos("Hest", "H");
if ($result === false) {
    echo "Not found";
} else {
    echo "Found at position " . $result;
}