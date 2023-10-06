<?php

class MovieListModel
{
    private $film = 'film';
    private $db;

    private $modelInfo = [
        "title" => "Movie List Page",
        "currentRoute" => "/movielist",
        "style" => "/public/css/movieList.css",
    ];

    public function __construct()
    {   
        $this->db = new Database;
    }

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function getAllMovies()
    {
        $this->db->query('SELECT * FROM ' . $this->film);
        return $this->db->resultSet();
    }
}