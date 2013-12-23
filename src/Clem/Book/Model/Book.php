<?php
namespace Clem\Book\Model;

use Clem\Book\Model\Author;
use Clem\Book\Database\Database;

/**
 * Represents a book
 *
 * @author Clément Herreman <clement.herreman@gmail.com>
 */
class Book
{
    /** @var string */
    private $title;

    /** @var Author */
    private $author;

    /** @var string */
    private $content;

    /**
     * Set the author attribute.
     *
     * @param \Clem\Book\Model\Author $author
     *
     * @return Book The $this object;
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Gets the author attribute.
     *
     * @return \Clem\Book\Model\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the content attribute.
     *
     * @param string $content
     *
     * @return Book The $this object;
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Gets the content attribute.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the title attribute.
     *
     * @param string $title
     *
     * @return Book The $this object;
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the title attribute.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $template = <<<BOOK
"%s" by '%s'.
Extract:
    %s

BOOK;
        $template = '
%s wrote "%s"
Resume:
    %s

';

        return sprintf(
            $template,
            $this->author->getFirstname().' '.$this->author->getLastname(),
            $this->title,
            $this->content
        );
    }

    /**
     * @return Book[]
     */
    public static function getAll($database)
    {
        $bookDatas = $database->query(
            "SELECT *
             FROM book, author
             WHERE book.author_id = author.id");
        $books = array();
        foreach ($bookDatas as $data) {
            $author = new Author();
            $author->setFirstname($data['firstname'])
                ->setLastname($data['lastname']);

            $book = new Book();
            $book->setTitle($data['title'])
                ->setContent($data['content']);

            $book->setAuthor($author);
            $author->addBook($book);

            $books[] = $book;
        }
        return $books;
    }
}
