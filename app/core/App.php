<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $param = [];
    protected $allowedController = ['Home', 'login', 'register', 'movie'];
    public function __construct() {
        $url = $this->parseUrl();
        session_start();
        if (isset($url[0]) && file_exists('app/controllers/'. $url[0] . '.php')) {
            if(isset($_SESSION['userId']) || in_array($url[0], $this->allowedController)){
                $this->controller = $url[0];
            }
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->param = [$url];
        }

        require_once 'app/common/RequestException.php';
        require_once 'app/views/libs/function/BookinAlert.php';
        try {
            call_user_func_array([$this->controller, $this->method], $this->param);
        } catch (RequestException $error) {
            if($error->getCode() == 401) {
                header('HTTP/1.1 401 Unauthorized');

                header('Location: /login?errMessage=' . $error->getMessage() . '&errType=danger');
                
                exit;
            } else if ($error->getCode() == 404) {
                header('HTTP/1.1 404 Not Found');

                header('Location: /login?errMessage=' . $error->getMessage() . '&errType=danger');
                
                exit;
            } else if ($error->getCode() == 400) {
                header('HTTP/1.1 400 Bad Request');

                header('Location: /register?errMessage=' . $error->getMessage() . '&errType=danger');

                exit;
            }
        }   
    }

    public function parseUrl() {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
            parse_str($query, $queryParameters);

            return array_merge($url, $queryParameters);
        }
    }
}