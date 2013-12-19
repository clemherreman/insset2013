<?php
require_once(__DIR__.'/../vendor/autoload.php');

use Clem\Book\Model\Book;

$books = Book::getAll();

foreach ($books as $book) {
    echo $book.PHP_EOL;
}
