<?php

class HomeController extends Controller implements ControllerInterface
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

                    // Open connection to Book Model
                    $bookModel = $this->model('BookModel');

                    // Get newest releases from Book Model
                    $newestReleases = $bookModel->getNewestReleases();

                    // Get owned books from Book Model
                    $ownedBooks = $bookModel->getOwnedBooksByUserId($_SESSION['user_id']);

                    $homeView = $this->view('home', 'MainView', [
                        'newestReleases' => $newestReleases,
                        'ownedBooks' => $ownedBooks
                    ]);
                    
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
