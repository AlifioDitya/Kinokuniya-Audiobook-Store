<?php

class BookModel
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getBookByID($book_id)
    {
        $query = 'SELECT book_id, title, author, category, book_desc, price, publication_date, cover_img_url, audio_url FROM book WHERE book_id = :book_id LIMIT 1';

        $this->database->query($query);
        $this->database->bind('book_id', $book_id);

        $book = $this->database->fetch();

        return $book;
    }

    public function getBooks($page)
    {
        $query = 'SELECT book_id, title, author, category, book_desc, price, publication_date, cover_img_url, audio_url FROM book LIMIT :limit OFFSET :offset';

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

    public function getBooksByQuery($q, $page)
    {
        $query = 'SELECT title, author, category, book_desc, price, publication_date, cover_img_url, audio_url FROM book WHERE title LIKE :q OR author LIKE :q OR category LIKE :q LIMIT :limit OFFSET :offset';

        $this->database->query($query);
        $this->database->bind('q', '%' . $q . '%');
        $this->database->bind('limit', ROWS_PER_PAGE);
        $this->database->bind('offset', ($page - 1) * ROWS_PER_PAGE);
        $books = $this->database->fetchAll();

        $query = 'SELECT CEIL(COUNT(book_id) / :rows_per_page) AS page_count FROM book WHERE title LIKE :q OR author LIKE :q OR category LIKE :q';

        $this->database->query($query);
        $this->database->bind('q', '%' . $q . '%');
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

    public function getBookCategories()
    {
        // Construct the SQL query to fetch all book categories
        $query = 'SELECT DISTINCT category FROM book';

        // Execute the query
        $this->database->query($query);
        $categories = $this->database->fetchAll();

        // Return the result
        return $categories;
    }

    public function isOwnedByID($book_id, $user_id)
    {
        // Construct the SQL query to check if a book is owned by a user
        $query = 'SELECT COUNT(*) AS count FROM book_ownership WHERE book_id = :book_id AND user_id = :user_id';

        // Bind the parameters
        $this->database->query($query);
        $this->database->bind('book_id', $book_id);
        $this->database->bind('user_id', $user_id);

        // Execute the query
        $result = $this->database->fetch();

        // Return the result
        return $result->count > 0;
    }

    public function getBooksInCart($user_id)
    {
        // Construct the SQL query to fetch books in a user's cart
        $query = 'SELECT b.book_id, b.title, b.author, b.price, b.cover_img_url
                FROM book AS b
                INNER JOIN cart AS c ON b.book_id = c.book_id
                WHERE c.user_id = :user_id';

        // Bind the user_id parameter
        $this->database->query($query);
        $this->database->bind('user_id', $user_id);

        // Execute the query
        $cartBooks = $this->database->fetchAll();

        // Return the result
        return $cartBooks;
    }

    public function buyBooks($user_id, $book_ids)
    {
        // Construct the SQL query to buy books
        $query = 'INSERT INTO book_ownership (user_id, book_id) VALUES ';

        // Construct the query parameters
        $params = [];
        foreach ($book_ids as $book_id) {
            $params[] = '(:user_id, ' . $book_id . ')';
        }

        // Join the query parameters
        $query .= implode(', ', $params);

        // Bind the user_id parameter
        $this->database->query($query);
        $this->database->bind('user_id', $user_id);

        // Execute the query
        $this->database->execute();
    }

    public function isInCart($user_id, $book_id)
    {
        // Construct the SQL query to check if a book is in a user's cart
        $query = 'SELECT COUNT(*) AS count FROM cart WHERE user_id = :user_id AND book_id = :book_id';

        // Bind the parameters
        $this->database->query($query);
        $this->database->bind('user_id', $user_id);
        $this->database->bind('book_id', $book_id);

        // Execute the query
        $result = $this->database->fetch();

        // Return the result
        return $result->count > 0;
    }

    public function addToCart($user_id, $book_id)
    {
        // Construct the SQL query to add a book to a user's cart
        $query = 'INSERT INTO cart (user_id, book_id) VALUES (:user_id, :book_id)';

        // Bind the parameters
        $this->database->query($query);
        $this->database->bind('user_id', $user_id);
        $this->database->bind('book_id', $book_id);

        // Execute the query
        $this->database->execute();
    }

    public function flushCart($user_id)
    {
        // Construct the SQL query to flush a user's cart
        $query = 'DELETE FROM cart WHERE user_id = :user_id';

        // Bind the user_id parameter
        $this->database->query($query);
        $this->database->bind('user_id', $user_id);

        // Execute the query
        $this->database->execute();
    }
}