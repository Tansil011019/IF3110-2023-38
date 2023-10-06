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

    private $defaultQuery = [
        "page" => 1,
        "pageSize" => 12,
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
        if(empty($query)) {
            $query = $this->defaultQuery;
        }

        $page = isset($query['page']) ? max(1, intval($query['page'])) : $this->defaultQuery['page'];
        $pageSize = isset($query['pageSize']) ? intval($query['pageSize']) : $this->defaultQuery['pageSize'];

        $offset = ($page-1)*$pageSize;

        $condition = [];
        
        if(isset($query['genre'])) {
            $condition[] = 'genre = :genre';
        }

        $whereClause = empty($conditions) ? '' : 'WHERE ' . implode(' AND ', $conditions);

        $finalQuery = 'SELECT * FROM ' . $this->table . ' ' . $whereClause . ' ' . ' LIMIT ' . $pageSize . ' OFFSET ' . $offset;

        $this->db->query($finalQuery);

        if (isset($query['genre'])) {
            $this->db->bind(':genre', ucfirst($query['genre']), PDO::PARAM_STR);
        }   

        return $this->db->resultSet();
    }

    public function getRandomData($number=5) {

    }
}
