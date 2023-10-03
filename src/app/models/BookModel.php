<?php

class BookModel
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getBookFromID($book_id)
    {
        $query = 'SELECT title, author, category, book_desc, price, publication_date, cover_img_url, audio_url FROM book WHERE book_id = :book_id LIMIT 1';

        $this->database->query($query);
        $this->database->bind('book_id', $book_id);

        $book = $this->database->fetch();

        return $book;
    }

    public function getBooks($page)
    {
        $query = 'SELECT title, author, category, book_desc, price, publication_date, cover_img_url, audio_url FROM book LIMIT :limit OFFSET :offset';

        $this->database->query($query);
        $this->database->bind('limit', ROWS_PER_PAGE);
        $this->database->bind('offset', ($page - 1) * ROWS_PER_PAGE);
        $books = $this->database->fetchAll();

        $query = 'SELECT CEIL(COUNT(book_id) / :rows_per_page) AS page_count FROM book';

        $this->database->query($query);
        $this->database->bind('rows_per_page', ROWS_PER_PAGE);
        $book = $this->database->fetch();
        $pageCount = $book->page_count;

        $returnArr = ['books' => $books, 'pages' => $pageCount];
        return $returnArr;
    }

    public function getBooksByCategory($category, $page)
    {
        $query = 'SELECT title, author, category, book_desc, price, publication_date, cover_img_url, audio_url FROM book WHERE category = :category LIMIT :limit OFFSET :offset';

        $this->database->query($query);
        $this->database->bind('category', $category);
        $this->database->bind('limit', ROWS_PER_PAGE);
        $this->database->bind('offset', ($page - 1) * ROWS_PER_PAGE);
        $books = $this->database->fetchAll();

        $query = 'SELECT CEIL(COUNT(book_id) / :rows_per_page) AS page_count FROM book WHERE category = :category';

        $this->database->query($query);
        $this->database->bind('category', $category);
        $this->database->bind('rows_per_page', ROWS_PER_PAGE);
        $book = $this->database->fetch();
        $pageCount = $book->page_count;

        $returnArr = ['books' => $books, 'pages' => $pageCount];
        return $returnArr;
    }

    // public function getByQuery($q, $sort = 'price', $filter ='price', $page = 1)
    // {
       
    // }


}