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

    public function getFilteredBooks($q, $category, $priceRange, $sortBy, $sortOrder, $page)
    {
        // Construct the base SQL query
        $query = 'SELECT title, author, category, book_desc, price, publication_date, cover_img_url, audio_url
                FROM book 
                WHERE (title LIKE :q OR author LIKE :q OR category LIKE :q)';

        // Apply additional filters based on category and price range
        if ($category !== 'all') {
            $query .= ' AND category = :category';
        }

        if ($priceRange === 'under_500k') {
            $query .= ' AND price < 500000';
        } elseif ($priceRange === '500k_to_1000k') {
            $query .= ' AND price BETWEEN 500000 AND 1000000';
        } elseif ($priceRange === 'over_1000k') {
            $query .= ' AND price > 1000000';
        }

        // Add sorting criteria
        if ($sortBy === 'publication_date') {
            $query .= ' ORDER BY publication_date';
        } elseif ($sortBy === 'price') {
            $query .= ' ORDER BY price';
        }

        // Add sorting order
        if ($sortOrder === 'asc') {
            $query .= ' ASC';
        } elseif ($sortOrder === 'desc') {
            $query .= ' DESC';
        }

        // Add pagination
        $query .= ' LIMIT :limit OFFSET :offset';

        // Bind the search query parameter
        $this->database->query($query);
        $this->database->bind('limit', ROWS_PER_PAGE);
        $this->database->bind('offset', ($page - 1) * ROWS_PER_PAGE);
        $this->database->bind('q', '%' . $q . '%');
        if ($category !== 'all') {
            $this->database->bind('category', $category);
        }
        
        // Execute the query
        $books = $this->database->fetchAll();

        // Calculate the total number of pages
        $countQuery = 'SELECT CEIL(COUNT(book_id) / :rows_per_page) AS page_count 
                    FROM book
                    WHERE (title LIKE :q OR author LIKE :q OR category LIKE :q)';

        // Apply the same filters for counting
        if ($category !== 'all') {
            $countQuery .= ' AND category = :category';
        }

        if ($priceRange === 'under_500k') {
            $countQuery .= ' AND price < 500000';
        } elseif ($priceRange === '500k_to_1000k') {
            $countQuery .= ' AND price BETWEEN 500000 AND 1000000';
        } elseif ($priceRange === 'over_1000k') {
            $countQuery .= ' AND price > 1000000';
        }

        $this->database->query($countQuery);
        $this->database->bind('q', '%' . $q . '%');

        if ($category !== 'all') {
            $this->database->bind('category', $category);
        }

        $this->database->bind('rows_per_page', ROWS_PER_PAGE);

        $book = $this->database->fetch();
        $pageCount = $book->page_count;

        // Create the return array
        $returnArr = ['books' => $books, 'pages' => $pageCount];
        return $returnArr;
    }

    public function getNewestReleases()
    {
        // Construct the SQL query to fetch the newest releases
        $query = 'SELECT book_id, title, author, category, book_desc, price, publication_date, cover_img_url, audio_url 
                FROM book 
                ORDER BY publication_date DESC 
                LIMIT 5';

        // Execute the query
        $this->database->query($query);
        $newestReleases = $this->database->fetchAll();

        // Return the result
        return $newestReleases;
    }

    public function getOwnedBooksByUserId($userId)
    {
        // Construct the SQL query to fetch owned books for a user
        $query = 'SELECT b.title, b.author, b.category, b.book_desc, b.price, b.publication_date, b.cover_img_url, b.audio_url
                FROM book AS b
                INNER JOIN book_ownership AS bo ON b.book_id = bo.book_id
                WHERE bo.user_id = :user_id';

        // Bind the user_id parameter
        $this->database->query($query);
        $this->database->bind('user_id', $userId);

        // Execute the query
        $ownedBooks = $this->database->fetchAll();

        // Return the result
        return $ownedBooks;
    }


}