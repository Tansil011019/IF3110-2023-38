<?php

class Schedule extends Controller {
    public function index() {
        $headerData['title'] = 'Schedule Page';
        $headerData['currentRoute'] = '/schedule';
        $this->view('templates/header', $headerData);
        $this->view('schedule/index');
        $this->view('templates/footer');
    }
}