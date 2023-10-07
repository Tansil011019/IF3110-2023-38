<?php

class Register extends Controller
{
    public function index($queryParameter = [])
    {
        $data['header'] = $this->model("RegisterModel")->getHeader();

        if (isset($queryParameter['errMessage']) && isset($queryParameter['errType'])) {
            $data['errorMessage'] = $queryParameter['errMessage'];
            $data['errorType'] = $queryParameter['errType'];
        }

        $this->view('templates/header', $data);
        $this->view('auth/register/index', $data);
        $this->view('templates/footer');
    }

    public function registerAjax()
    {
        $this->ajax('RegisterAjax');
    }
}
