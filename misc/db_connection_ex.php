<?php

/* PHP-MySQL: deprecated in PHP 5.5.0, and it was removed in PHP 7.0.0
mysql_connect($db_host, $db_user, $db_password);
mysql_select_db($dn_name);

// 下面的敘述中，$location 的地方容易被 SQL Injection
// $result = mysql_query("SELECT `name` FROM `users` WHERE `location` = '$location'");

$query = sprintf("SELECT * FROM users WHERE user='%s' AND password='%s'",
		mysql_real_escape_string($user),
		mysql_real_escape_string($password));
 
$result = mysql_query($query);
 
while ($row = mysql_fetch_array($result,  MYSQL_ASSOC)) {
	echo $row['name'];
}
 
mysql_free_result($result);
*/

/* PHP-MySQLi: Procedural style
define("DB_SERVER", "localhost");
define("DB_USER", "widget_cms");
define("DB_PASS", "secretpassword");
define("DB_NAME", "widget_corp");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Test if connection succeeded
if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
        mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
    );
}

mysqli_query($connection, "CREATE TEMPORARY TABLE myCity LIKE City");

$city = "'s Hertogenbosch";

// this query will fail, cause we didn't escape $city 
if (!mysqli_query($connection, "INSERT into myCity (Name) VALUES ('$city')")) {
    printf("Error: %s\n", mysqli_sqlstate($connection));
}

$city = mysqli_real_escape_string($connection, $city);

// this query with escaped $city will work 
if (mysqli_query($connection, "INSERT into myCity (Name) VALUES ('$city')")) {
    printf("%d Row inserted.\n", mysqli_affected_rows($connection));
}

mysqli_close($connection);
*/

/* PHP-MySQLi: Object oriented style
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_error . $mysqli->connect_errno);
}

$sql = "INSERT INTO `users` (id, name, gender, location) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
 
$stmt->bind_param('dsss', $source_id, $source_name, $source_gender, $source_location);
 
$stmt->execute();
 
$stmt->bind_result($id, $name, $gender, $location);
 
while ($stmt->fetch()) {
	echo $id . $name . $gender . $location;
}
 
$stmt->close();
$mysqli->close();
*/

/* PDO (PHP Data Object)
$dsn = "mysql:host=$db_host;dbname=$db_name;port=3306;charset=utf8";

try {
    $dbh = new PDO($dsn, $db_user, $db_password);
} catch (PDOException $e) {
    // Database connection failed
    echo "Database connection1 failed";
    exit;
}	
 
$sql = "SELECT `name`, `location` FROM `users` WHERE `location` = ? , `name` = ?";
$sth = $dbh->prepare($sql);
 
$sth->execute(array($location, $name));
 
$result = $sth->fetch(PDO::FETCH_OBJ);
echo $result->name . $result->location;
 
$dbh = NULL;
*/
