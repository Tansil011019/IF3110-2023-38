<?php

class History extends Controller {
    public function index() {
        $data['header'] = $this->model('HistoryModel')->getHeader();

        $this->view('templates/header', $data);
        $this->view('history/index');
        $this->view('templates/footer');
    }
}