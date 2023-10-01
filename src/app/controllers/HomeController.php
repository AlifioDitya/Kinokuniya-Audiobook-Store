<?php

class HomeController extends Controller implements ControllerInterface
{
    public function index()
    {
        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':

                    $homeView = $this->view('home', 'MainView');
                    $homeView->render();

                    break;
                default:
                    throw new Exception('Method Not Allowed', 405);
                    // throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
        }
    }
    
}
