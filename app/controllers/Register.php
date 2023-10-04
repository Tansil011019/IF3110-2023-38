<?php

class Register extends Controller {
    public function index() {
        $headerData['title'] = 'Register Page';
        $headerData['currentRoute'] = '/register';
        $headerData['style'] = '/public/css/login-register.css';

        $this->view('templates/header', $headerData);
        $this->view('auth/register/index');
        $this->view('templates/footer');
    }
}