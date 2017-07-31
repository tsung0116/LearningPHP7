<?php

@$fp = fopen('test.txt','ab');

if (!$fp) {
    echo "Please try again later.......";
exit;
}

var_dump($fp);

$date = '2017/07/04';
$tireqty = 10;
$oilqty = 20;
$sparkqty = 30;
$totalamount = 60;
$address = 'Taipei';
$outputstring = $date. "\t" . $tireqty . " tires \t" . $oilqty." oil\t"
    . $sparkqty . " spark plugs\t\$" . $totalamount
    . "\t". $address . "\n";

flock($fp, LOCK_EX);
fwrite($fp, $outputstring, strlen($outputstring));
flock($fp, LOCK_UN);
fclose($fp);

@$fp = fopen('test.txt','rb');

if (!$fp) {
    echo "Please try again later.......";
    exit;
}

flock($fp, LOCK_SH); // lock file for reading

while (!feof($fp)) {
    $order= fgets($fp);
    echo htmlspecialchars($order) . PHP_EOL;
}

flock($fp, LOCK_UN); // release read lock
fclose($fp);

@$fp = fopen('test.txt','rb');

if (!$fp) {
    echo "Please try again later.......";
    exit;
}

flock($fp, LOCK_SH); // lock file for reading

while (!feof($fp)) {
    $order_a = fgetcsv($fp, 0, "\t");
    var_dump($order_a); 
}

flock($fp, LOCK_UN); // release read lock
fclose($fp);

print_r($order_a);
