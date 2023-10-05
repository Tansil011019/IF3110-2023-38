<?php

class Home extends Controller
{
    public function index()
    {
        $data['header'] = $this->model("HomeModel")->getHeader();
        $data['movies'] = $this->model("HomeModel")->getAllMovie();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
