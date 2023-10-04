<?php

class MyBooksController extends Controller implements ControllerInterface
{
    public function index()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':

                    // Redirect to Login Page if not logged in
                    if (!isset($_SESSION['user_id'])) {
                        header('Location: ' . BASE_URL . '/user/login');
                        exit;
                    }

                    $bookModel = $this->model('BookModel');

                    $bookList = $bookModel->getOwnedBooksByUserId($_SESSION['user_id']);
                    $bookCategories = $bookModel->getBookCategories();
                    
                    // Check if bookList is an empty array
                    if (empty($bookList)) {
                        $ownedBooks = null;
                    } else {
                        $ownedBooks = $bookList;
                    }

                    $myBooksView = $this->view('mybooks', 'MyBooksView', ['bookCategories' => $bookCategories, 'ownedBooks' => $ownedBooks]);
                    $myBooksView->render();

                    break;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function search()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':

                    $bookModel = $this->model('BookModel');

                    $bookList = $bookModel->getBooksByQuery($_GET['q'], 1);
                    $books = $bookList['books'];
                    // $pages = $bookList['pages'];

                    header('Content-Type: application/json');
                    echo error_log(json_encode($books));
                    http_response_code(200);
                    exit;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function preview()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':

                    // Redirect to Login Page if not logged in
                    if (!isset($_SESSION['user_id'])) {
                        header('Location: ' . BASE_URL . '/user/login');
                        exit;
                    }

                    // Open connection to Book Model
                    $bookModel = $this->model('BookModel');

                    // Get book by ID
                    $book = $bookModel->getBookByID($_GET['book_id']);

                    // Check if user is the owner of the book
                    $owner = $bookModel->isOwnedByID($_GET['book_id'], $_SESSION['user_id']);

                    // If not the owner, redirect to catalogue
                    if (!$owner) {
                        header('Location: ' . BASE_URL . '/catalogue/preview/?book_id=' . $_GET['book_id']);
                        exit;
                    }

                    $bookView = $this->view('mybooks', 'AudiobookView', [
                        'bookData' => $book,
                    ]);
                    
                    $bookView->render();

                    break;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }
    
}
