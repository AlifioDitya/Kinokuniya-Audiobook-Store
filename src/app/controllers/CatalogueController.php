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

                    $bookList = $bookModel->getBooksByQuery($_GET['query'], $_GET['page']);

                    header('Content-Type: application/json');
                    echo json_encode($bookList);
                    http_response_code(200);
                    exit;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }
    
}
