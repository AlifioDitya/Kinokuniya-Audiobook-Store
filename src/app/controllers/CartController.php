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

                    // $cartBooks = $bookModel->getBooksInCart($_SESSION['user_id']);

                    if (empty($cartBooks)) {
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
    
}
