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

    public function getMovieByQuery($query) {
        
    }
}
