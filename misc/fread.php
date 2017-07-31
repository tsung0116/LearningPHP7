<?php

echo "fgets()" . PHP_EOL;
@$fp = fopen('test.txt','rb');

if (!$fp) {
    echo "Please try again later.......";
    exit;
}

flock($fp, LOCK_SH); // lock file for reading

while (!feof($fp)) {
    $order= fgets($fp);                 //doesn't return EOF.
    echo htmlspecialchars($order);       
}

flock($fp, LOCK_UN); // release read lock
fclose($fp);

echo "fgetcsv()" . PHP_EOL;
$fp = fopen('test.txt','rb');

flock($fp, LOCK_SH); // lock file for reading

$i = 0;
while (!feof($fp)) {    
    $orderArry[$i] = fgetcsv($fp, 0, "\t");
    if (!feof($fp))                 //don’t want to store the EOF.
        $fArray[$i] = $orderArry[$i];
    // var_dump($order_a[$i]);
    $i++;    
}

flock($fp, LOCK_UN); // release read lock
// fclose($fp);
echo 'Final position of the file pointer is ' . (ftell($fp)) . PHP_EOL;
print_r($fArray);

echo "readfile()" . PHP_EOL;
readfile("test.txt");

echo "fpassthru()" . PHP_EOL;
//$fp = fopen('test.txt','rb');
rewind($fp);
echo 'After rewind, the position is ' . (ftell($fp)) . PHP_EOL;
fpassthru($fp);
fclose($fp);

echo "file()" . PHP_EOL;
$fileArray = file("test.txt");
print_r($fileArray);

echo "file_get_contents()" . PHP_EOL;
$fileString = file_get_contents("test.txt");
echo $fileString;

echo "fgetc()" . PHP_EOL;
$fp = fopen('test.txt','rb');
while (!feof($fp)) {
    $char = fgetc($fp);
    if (!feof($fp))         //don’t want to echo the EOF.
        echo $char;
}
fclose($fp);