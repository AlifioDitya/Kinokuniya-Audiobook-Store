<?php

class CatalogueController extends Controller implements ControllerInterface
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

                    $bookList = $bookModel->getBooks(1);
                    $bookCategories = $bookModel->getBookCategories();
                    $books = $bookList['books'];

                    $catalogueView = $this->view('catalogue', 'CatalogueView', ['bookCategories' => $bookCategories, 'books' => $books]);
                    $catalogueView->render();

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

                    // Get the ownership status
                    $owner = $bookModel->isOwnedByID($_GET['book_id'], $_SESSION['user_id']);

                    // If the book is owned, redirect to owned book preview
                    if ($owner) {
                        header('Location: ' . BASE_URL . '/mybooks/preview?book_id=' . $_GET['book_id']);
                        exit;
                    }

                    $bookView = $this->view('catalogue', 'BookPreviewView', [
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
