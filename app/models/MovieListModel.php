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

    public function getMovieCount()
    {
        $this->db->query('SELECT COUNT(*) FROM ' . $this->film);
        return $this->db->resultSet();
    }

    public function getSortedMovies($sortAttribute, $sortOrder)
    {
        $this->db->query('SELECT * FROM ' . $this->film . ' ORDER BY ' . $sortAttribute . ' ' . $sortOrder);
        return $this->db->resultSet();
    }
}