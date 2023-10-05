<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $param = [];
    public function __construct() {
        $url = $this->parseUrl();
        
        if (isset($url[0]) && file_exists('app/controllers/'. $url[0] . '.php')) {
            $this->controller = $url[0];
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

        call_user_func_array([$this->controller, $this->method], $this->param);
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