<?php

class Home extends Controller
{
    public function index($queryParameters = [])
    {
        $data['header'] = $this->model("HomeModel")->getHeader();
        $data['slidingCardMovies'] = $this->model("HomeModel")->getRandomData();
        $data['movies'] = $this->model("HomeModel")->getMovieByQuery($queryParameters);
        $data['movieCount'] = $this->model("HomeModel")->getCountDataByFilter($queryParameters)['count'];
        $data['dropdown-genres'] = $this->model("HomeModel")->getAllGenres();
        $data['dropdown-status'] = $this->model("HomeModel")->getAllStatus();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
