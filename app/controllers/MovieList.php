<?php

class MovieList extends Controller {
    public function index() 
    {
        $data['header'] = $this->model('MovieListModel')->getHeader();
        $data['movies'] = $this->model('MovieListModel')->getAllMovies();

        $this->view('templates/header', $data);
        $this->view('movielist/index', $data);
        $this->view('templates/footer');
    }
}