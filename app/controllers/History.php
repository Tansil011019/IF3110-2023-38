<?php

class History extends Controller {
    public function index() {
        $data['header'] = $this->model('HistoryModel')->getHeader();
        $data['movies'] = $this->model('HistoryModel')->getAllMovies();
        $data['transactions'] = $this->model('HistoryModel')->getAllTransactions();

        $this->view('templates/header', $data);
        $this->view('history/index', $data);
        $this->view('templates/footer');
    }
}