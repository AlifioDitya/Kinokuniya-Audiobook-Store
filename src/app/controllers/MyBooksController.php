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

                    $bookList = $bookModel->getOwnedBooksByUserId($_SESSION['user_id'], 1);
                    $bookCategories = $bookModel->getBookCategories();
                    
                    // Check if bookList is an empty array
                    if (empty($bookList)) {
                        $ownedBooks = null;
                    } else {
                        $ownedBooks = $bookList['books'];
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
    
}
