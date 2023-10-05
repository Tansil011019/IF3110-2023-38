<?php

class Register extends Controller {
    public function index() {
        $data['header'] = $this->model("RegisterModel")->getHeader();

        $this->view('templates/header', $data);
        $this->view('auth/register/index');
        $this->view('templates/footer');
    }
}