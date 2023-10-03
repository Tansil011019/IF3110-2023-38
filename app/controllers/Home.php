<?php

class Home extends Controller {
    public function index () {
        $headerData['title'] = 'Home Page';
        $headerData['currentRoute'] = '/home';
        $this->view('templates/header', $headerData);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}