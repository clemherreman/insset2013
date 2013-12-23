<?php
namespace Clem\Test\Book;

use Clem\Book\Model\Book;
use Clem\Book\Model\Author;

/**
 *
 *
 * @author Clément Herreman <clement.herreman@gmail.com>
 */
class BookTest extends \PHPUnit_Framework_TestCase
{
    public function test_getAll_with_existing_books()
    {
        $fakeDb = new FakeDb();

        $results = Book::getAll($fakeDb);

        $this->assertCount(3, $results);
    }
    public function test_to_string()
    {
        $book = new Book();
        $book->setTitle('My title')
            ->setContent('My content');

        $author = new Author();
        $author->setFirstname('Jean-Claude')
            ->setLastname('Vandamme');

        $book->setAuthor($author);
        $author->addBook($book);

        $toString = (string) $book;

        $hasTitle = (bool) preg_match('/"My title"/', $toString);
        $hasAuthor = (bool) preg_match('/Jean-Claude Vandamme/', $toString);

        $this->assertTrue($hasTitle, 'No title found');
        $this->assertTrue($hasAuthor, 'No author name found');
    }
}

class FakeDb
{
    public function query($sql) {
        return array(
            array (
                'id' => '2',
                'title' => 'Seigneur des anneaux',
                'content' => 'Once upon a time in the Mordor...',
                'author_id' => '2',
                'firstname' => 'JRR',
                'lastname' => 'Tolkien',
            ),
            array (
                'id' => '1',
                'title' => 'I, Robot',
                'content' => 'Once upon a time with Will Smith',
                'author_id' => '1',
                'firstname' => 'Isaac',
                'lastname' => 'Asimov',
            ),
            array (
                'id' => '2',
                'title' => 'Bilbo le Hobbit',
                'content' => 'Once upon a time with a dragon',
                'author_id' => '2',
                'firstname' => 'JRR',
                'lastname' => 'Tolkien',
            )
        );
    }
}
