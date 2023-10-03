<?php

class Home extends Controller {
    public function index () {
        $headerData['title'] = 'Home Page';
        $headerData['currentRoute'] = '/home';
        $headerData['style'] = '/public/css/home.css';

        $datum1['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum1['movieGenre'] = 'Genre';
        $datum1['movieTitle'] = 'Judul Film';
        $datum2['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum2['movieGenre'] = 'Genre';
        $datum2['movieTitle'] = 'Judul Film';
        $datum3['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum3['movieGenre'] = 'Genre';
        $datum3['movieTitle'] = 'Judul Film';
        $datum4['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum4['movieGenre'] = 'Genre';
        $datum4['movieTitle'] = 'Judul Film';
        $datum5['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum5['movieGenre'] = 'Genre';
        $datum5['movieTitle'] = 'Judul Film';
        $datum6['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum6['movieGenre'] = 'Genre';
        $datum6['movieTitle'] = 'Judul Film';
        $datum7['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum7['movieGenre'] = 'Genre';
        $datum7['movieTitle'] = 'Judul Film';
        $datum8['movieImage'] = '/public/images/bookin-default-movie-img.svg';
        $datum8['movieGenre'] = 'Genre';
        $datum8['movieTitle'] = 'Judul Film';
        $data = [];
        array_push($data, $datum1);
        array_push($data, $datum2);
        array_push($data, $datum3);
        array_push($data, $datum4);
        array_push($data, $datum5);
        array_push($data, $datum6);
        array_push($data, $datum7);
        array_push($data, $datum8);

        $this->view('templates/header', $headerData);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}