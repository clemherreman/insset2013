<?php
namespace Clem\Book\Model;

use Clem\Book\Model\Book;

/**
 * Represents a human being that writes book. Example: Isaac Asimov.
 *
 * @author Clément Herreman <clement.herreman@gmail.com>
 */
class Author
{
    /** @var string */
    private $firstname;

    /** @var string */
    private $lastname;

    /** @var Book[] */
    private $books;

    /**
     * Set the books attribute.
     *
     * @param \Clem\Book\Model\Book[] $books
     *
     * @return Author The $this object;
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * Gets the books attribute.
     *
     * @return \Clem\Book\Model\Book[]
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Add a book
     *
     * @param Book $book
     *
     * @return $this
     */
    public function addBook(Book $book)
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * Set the firstname attribute.
     *
     * @param string $firstname
     *
     * @return Author The $this object;
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Gets the firstname attribute.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the lastname attribute.
     *
     * @param string $lastname
     *
     * @return Author The $this object;
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Gets the lastname attribute.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }
}
