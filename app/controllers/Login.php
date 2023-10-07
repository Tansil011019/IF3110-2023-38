<?php

class Login extends Controller {
    public function index() {
        $data['header'] = $this->model('LoginModel')->getHeader();

        $this->view('templates/header', $data);
        $this->view('auth/login/index');
        $this->view('templates/footer');
    }

    public function loginAjax() {
        $this->ajax('LoginAjax');
    }

    public function checkLoginAjax() {
        $this->ajax('CheckLoginAjax');
    }
}