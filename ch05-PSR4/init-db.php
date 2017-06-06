<?php

use Bookstore\Utils\Config;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

function addBook(int $id, int $amount = 1): void 
{
    global $db;
    $query = 'UPDATE book SET stock = stock + :n WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue('id', $id);
    $statement->bindValue('n', $amount);
    
    if (!$statement->execute()) {
        throw new Exception($statement->errorInfo()[2]);
    }
}

function addSale(int $userId, array $bookIds): void 
{
    global $db;
    
    $db->beginTransaction();
    try {
        $query = 'INSERT INTO sale (customer_id, date) VALUES(:id, NOW())';
        $statement = $db->prepare($query);
        if (!$statement->execute(['id' => $userId])) {
            throw new Exception($statement->errorInfo()[2]);
        }
        $saleId = $db->lastInsertId();
        $query = 'INSERT INTO sale_book (book_id, sale_id) VALUES(:book, :sale)';
        $statement = $db->prepare($query);
        $statement->bindValue('sale', $saleId);
        foreach ($bookIds as $bookId) {
            $statement->bindValue('book', $bookId);
            if (!$statement->execute()) {
                throw new Exception($statement->errorInfo()[2]);
            }
        }
        
        $db->commit();
    } catch (Exception $e) {
        $db->rollBack();
        throw $e;
    }
}

$dbConfig = Config::getInstance()->get('db');
$dsn = sprintf("mysql:host=%s;port=%s;dbname=%s;charset=%s",
        $dbConfig['host'],$dbConfig['port'],$dbConfig['dbname'], $dbConfig['charset']);
//echo $dsn;        
$db = new PDO(
    $dsn,
    $dbConfig['user'],
    $dbConfig['password']
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/* $rows = $db->query('SELECT * FROM book ORDER BY title');
foreach ($rows as $row) {
    var_dump($row);
} */

/* $query = <<<SQL
INSERT INTO book (isbn, title, author, price)
VALUES ("9788187981954", "Peter Pan", "J. M. Barrie", 2.34)
SQL;
$result = $db->exec($query);
var_dump($result);
$error = $db->errorInfo()[2];
var_dump($error); */

/* $query = 'SELECT * FROM book WHERE author = :author';
$statement = $db->prepare($query);
$statement->bindValue('author', 'George Orwell');
$statement->execute();
$rows = $statement->fetchAll();
var_dump($rows); */

/* $query = 'SELECT * FROM book WHERE id = :id';
$statement = $db->prepare($query);
$statement->bindValue('id', 2);
$statement->execute();
$rows = $statement->fetchAll();
var_dump($rows); */

/* $query = <<<SQL
    INSERT INTO book (isbn, title, author, price)
    VALUES (:isbn, :title, :author, :price)
SQL;
$statement = $db->prepare($query);
$params = [
    'isbn' => '9781412108614',
    'title' => 'Iliad',
    'author' => 'Homer',
    'price' => 9.25
];
$statement->execute($params);
echo $db->lastInsertId(); // 8 */

/* try {
    addSale(1, [1, 2, 200]);
} catch (Exception $e) {
    echo 'Error adding sale: ' . $e->getMessage();
} */

try {
    addSale(1, [1, 2, 3]);
} catch (Exception $e) {
    echo 'Error adding sale: ' . $e->getMessage();
}
