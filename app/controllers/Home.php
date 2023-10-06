<?php

class Home extends Controller
{
    public function index($queryParameters=[])
    {
        $data['header'] = $this->model("HomeModel")->getHeader();
        $data['slidingCardMovies'] = $this->model("HomeModel")->getRandomData();
        $data['movies'] = $this->model("HomeModel")->getMovieByQuery($queryParameters);

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
