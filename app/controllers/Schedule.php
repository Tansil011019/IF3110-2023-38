<?php

class Schedule extends Controller {
    public function index($queryParameters = []) {
        $data['header'] = $this->model("ScheduleModel")->getHeader();
        $data['schedule'] = $this->model("ScheduleModel")->getAllSchedule($queryParameters);
        $data['movieCount'] = $this->model("ScheduleModel")->getAllScheduleCount()['count'];

        $this->view('templates/header', $data);
        $this->view('schedule/index', $data);
        $this->view('templates/footer');
    }

    public function scheduleAjax() {
        $this->ajax('ScheduleAjax');
    }
}