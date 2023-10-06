<?php

class Schedule extends Controller {
    public function index() {
        $data['header'] = $this->model("ScheduleModel")->getHeader();
        $data['movies'] = $this->model('ScheduleModel')->getAllMovies();
        $data['transactions'] = $this->model('ScheduleModel')->getAllTransactions();

        $this->view('templates/header', $data);
        $this->view('schedule/index', $data);
        $this->view('templates/footer');
    }
}