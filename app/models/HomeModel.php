<?php

class HomeModel
{
    private $modelInfo = [
        "title" => "Home Page",
        "currentRoute" => "/home",
        "style" => "/public/css/home.css",
    ];

    private $movieList = [
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
        [
            "movieImage" => '/public/images/bookin-default-movie-img.svg',
            "movieGenre" => 'Genre',
            "movieTitle" => 'Judul Film'
        ],
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function getAllMovie()
    {
        return $this->movieList;
    }
}
