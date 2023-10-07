<?php

class Login extends Controller {
    public function index($queryParameter = []) {
        $data['header'] = $this->model('LoginModel')->getHeader();
        if (isset($queryParameter['errMessage']) && isset($queryParameter['errType'])) {
            $data['errorMessage'] = $queryParameter['errMessage'];
            $data['errorType'] = $queryParameter['errType'];
        }  
         
        $this->view('templates/header', $data);
        $this->view('auth/login/index', $data);
        $this->view('templates/footer');
    }

    public function loginAjax() {
        $this->ajax('LoginAjax');
    }

    public function checkLoginAjax() {
        $this->ajax('CheckLoginAjax');
    }
}