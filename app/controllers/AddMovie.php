<?php

class AddMovie extends Controller {
    public function index() {
        $data['header'] = $this->model('AddMovieModel')->getHeader();

        $this->view('templates/header', $data);
        $this->view('addMovie/index');
        $this->view('templates/footer');
    }
}