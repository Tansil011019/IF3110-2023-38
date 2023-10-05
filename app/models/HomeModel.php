<?php

class HomeModel
{
    private $table = 'film';
    private $db;

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

    public function __construct()
    {   
        $this->db = new Database;
    }
    
    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function getAllMovie()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
