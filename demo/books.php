<?php
require_once(__DIR__.'/../vendor/autoload.php');

use Clem\Book\Model\Book;
use Clem\Book\Database\Database;


$books = Book::getAll(Database::getConnection());

foreach ($books as $book) {
    echo $book.PHP_EOL;
}
