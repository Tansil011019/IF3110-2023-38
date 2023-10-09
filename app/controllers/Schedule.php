<?php

class Schedule extends Controller {
    public function index($queryParameters = []) {
        $data['header'] = $this->model("ScheduleModel")->getHeader();
        $data['movies'] = $this->model("HomeModel")->getMovieByQuery($queryParameters);
        $data['movieCount'] = $this->model("HomeModel")->getCountDataByFilter($queryParameters)['count'];

        $this->view('templates/header', $data);
        $this->view('schedule/index', $data);
        $this->view('templates/footer');
    }
}