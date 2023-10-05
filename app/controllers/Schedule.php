<?php

class Schedule extends Controller {
    public function index() {
        $data['header'] = $this->model("ScheduleModel")->getHeader();

        $this->view('templates/header', $data);
        $this->view('schedule/index');
        $this->view('templates/footer');
    }
}