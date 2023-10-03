<?php

class Schedule extends Controller {
    public function index() {
        $headerData['title'] = 'Schedule Page';
        $headerData['currentRoute'] = '/schedule';
        $headerData['style'] = '/public/css/schedule.css';

        $this->view('templates/header', $headerData);
        $this->view('schedule/index');
        $this->view('templates/footer');
    }
}