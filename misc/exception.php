<?php

try {
    // throw new Exception('Not a PDO exception');
    $pdo = new PDO('mysql:host=wrong_host;dbname=wrong_name');
} catch (PDOException $e) {
    // Handle PDO exception
    echo "Caught PDO exception" . PHP_EOL;
} catch (Exception $e) {
    // Handle all other exceptions
    echo "Caught generic exception" . PHP_EOL;
} finally {
    // Always do this
    echo "Always do this" . PHP_EOL;
}