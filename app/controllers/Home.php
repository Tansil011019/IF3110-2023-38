<?php

class Home extends Controller {
    public function index () {
        $headerData['title'] = 'Home Page';
        $headerData['currentRoute'] = '/home';
        $datum1['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum1['movieGenre'] = 'Genre';
        $datum1['movieTitle'] = 'Title';
        $datum2['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum2['movieGenre'] = 'Genre';
        $datum2['movieTitle'] = 'Title';
        $datum3['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum3['movieGenre'] = 'Genre';
        $datum3['movieTitle'] = 'Title';
        $datum4['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum4['movieGenre'] = 'Genre';
        $datum4['movieTitle'] = 'Title';
        $data = [];
        array_push($data, $datum1);
        array_push($data, $datum2);
        array_push($data, $datum3);
        array_push($data, $datum4);
        $this->view('templates/header', $headerData);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}