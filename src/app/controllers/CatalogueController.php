<?php

class CatalogueController extends Controller implements ControllerInterface
{
    public function index()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':

                    // Open middleware for authentication
                    $auth = $this->middleware('AuthenticationMiddleware');

                    // Redirect to Login Page if not logged in
                    try {
                        $auth->isAuthenticated();
                    } catch (Exception $e) {
                        header('Location: ' . BASE_URL . '/user/login');
                        exit;
                    }

                    $bookModel = $this->model('BookModel');

                    $bookList = $bookModel->getBooks(1);
                    $bookCategories = $bookModel->getBookCategories();
                    $books = $bookList['books'];
                    $pages = $bookList['pages'];

                    $catalogueView = $this->view('catalogue', 'CatalogueView', ['bookCategories' => $bookCategories, 'books' => $books, 'pages' => $pages]);
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
                    $page = $_GET['page'] ?? 1;
                    $category = $_GET['category'] ?? 'All Categories';
                    $price = $_GET['price'] ?? 'All Prices';
                    $sort = $_GET['sort'] ?? 'Newest Releases';

                    $bookList = $bookModel->getBooksByQuery($_GET['q'], $page, $category, $price, $sort);
                    $books = $bookList['books'];
                    $pages = $bookList['pages'];

                    header('Content-Type: application/json');
                    http_response_code(200);
                    echo json_encode(['books' => $books, 'pages' => $pages]);
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

                    // If the book is owned, redirect to owned View Book
                    if ($owner) {
                        header('Location: ' . BASE_URL . '/mybooks/preview/?book_id=' . $_GET['book_id']);
                        exit;
                    }

                    $bookView = $this->view('catalogue', 'BookPreviewView', [
                        'bookData' => $book,
                    ]);
                    
                    $bookView->render();

                    break;

                case 'POST':
                    // Add the book to cart
                    // Open connection to Book Model
                    $bookModel = $this->model('BookModel');

                    // Check if the current book is already in the cart
                    $inCart = $bookModel->isInCart($_SESSION['user_id'], $_POST['book_id']);

                    // If the book is already in the cart
                    if ($inCart) {
                        http_response_code(302);
                        exit;
                    }

                    // Add the book to the cart
                    $bookModel->addToCart($_SESSION['user_id'], $_POST['book_id']);

                    // Return redirect_url
                    http_response_code(200);

                    // Redirect to cart
                    echo json_encode(['redirect_url' => BASE_URL . '/cart']);
                    
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function edit()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':

                    $authMiddleware = $this->middleware('AuthenticationMiddleware');
                    $authMiddleware = $this->middleware('AuthenticationMiddleware');
                    try {
                        $authMiddleware->isAdmin();
                    } catch (Exception $e) {
                        header('Location: ' . BASE_URL);
                        exit;
                    }

                    $editBookAdminView = $this->view('catalogue', 'EditBookAdminView');
                    $editBookAdminView->render();

                    break;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }

    public function control()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':

                    $authMiddleware = $this->middleware('AuthenticationMiddleware');
                    try {
                        $authMiddleware->isAdmin();
                    } catch (Exception $e) {
                        header('Location: ' . BASE_URL);
                        exit;
                    }

                    $homeView = $this->view('catalogue', 'AdminCatalogueView');
                    $homeView->render();

                    break;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }
    
}
