<?php

class CartController extends Controller implements ControllerInterface
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

                    // 

                    $cartBooks = $bookModel->getBooksInCart($_SESSION['user_id']);

                    if ($cartBooks == null || empty($cartBooks)) {
                        $cartBooks = [];
                    }

                    $cartView = $this->view('cart', 'CartView', ['cartBooks' => $cartBooks]);
                    $cartView->render();

                    break;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function fetch()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':

                    $bookModel = $this->model('BookModel');

                    $cartBooks = $bookModel->getBooksInCart($_SESSION['user_id']);

                    if ($cartBooks == null || empty($cartBooks)) {
                        $cartBooks = [];
                    }

                    header('Content-Type: application/json');
                    echo json_encode($cartBooks);
                    http_response_code(200);
                    exit;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function buy()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':

                    $bookModel = $this->model('BookModel');

                    // Takes raw data from the request
                    $json = file_get_contents('php://input');

                    // Converts it into a PHP object
                    $data = json_decode($json);

                    // Buy the books
                    $bookModel->buyBooks($_SESSION['user_id'], $data->book_ids);

                    // Flush the cart contents
                    $bookModel->flushCart($_SESSION['user_id']);

                    header('Content-Type: application/json');

                    // Redirect to owned books page
                    http_response_code(200);
                    echo json_encode(['redirect_url' => BASE_URL . '/mybooks']);
                    exit;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }
    
}
