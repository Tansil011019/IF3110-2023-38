<?php

class AddMovie extends Controller {
    public function index() {
        $headerData['title'] = 'Add Movie';
        $headerData['currentRoute'] = '/addMovie';
        $headerData['style'] = 'public/css/addMovie.css';

        $this->view('templates/header', $headerData);
        $this->view('addMovie/index');
        $this->view('templates/footer');
    }
}