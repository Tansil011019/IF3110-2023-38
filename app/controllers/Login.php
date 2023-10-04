<?php

class Login extends Controller {
    public function index() {
        $headerData['title'] = 'Login Page';
        $headerData['currentRoute'] = '/login';
        $headerData['style'] = '/public/css/login-register.css';

        $this->view('templates/header', $headerData);
        $this->view('auth/login/index');
        $this->view('templates/footer');
    }
}