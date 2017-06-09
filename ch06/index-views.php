<?php

use Bookstore\Models\{BookModel, SalesModel};
use Bookstore\Core\Db;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
$twig = new Twig_Environment($loader);

// $bookModel = new BookModel(Db::getInstance());

// $book = $bookModel->get(1);
// $params = ['book' => $book];
// echo $twig->loadTemplate('book.twig')->render($params);

// $books = $bookModel->getAll(1, 3);
// $params = ['books' => $books, 'currentPage' => 2];
// echo $twig->loadTemplate('books.twig')->render($params);

$salesModel = new SalesModel(Db::getInstance());

// $sales = $salesModel->getByUser(1);
// $params = ['sales' => $sales];
// echo $twig->loadTemplate('sales.twig')->render($params);

$sale = $salesModel->get(3);
$params = ['sale' => $sale];
echo $twig->loadTemplate('sale.twig')->render($params);