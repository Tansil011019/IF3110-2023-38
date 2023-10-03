<?php

class History extends Controller {
    public function index() {
        $headerData['title'] = 'History Page';
        $headerData['currentRoute'] = '/history';
        $headerData['style'] = '/public/css/history.css';

        $this->view('templates/header', $headerData);
        $this->view('history/index');
        $this->view('templates/footer');
    }
}