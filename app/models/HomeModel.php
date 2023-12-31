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
        "status" => 'Now Showing',
    ];

    private $statusFilm = [
        "Now Showing" => 'starting_date <= current_timestamp AND end_date >= current_timestamp',
        "Up Coming" => 'starting_date > current_timestamp',
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

    public function getAllStatus()
    {
        return [
            ['status' => 'Now Showing'],
            ['status' => 'Up Coming'],
        ];
    }

    public function getMovieByQuery($query)
    {
        if (empty($query)) {
            $query = $this->defaultQuery;
        }

        $page = isset($query['page']) ? max(1, intval($query['page'])) : $this->defaultQuery['page'];
        $pageSize = isset($query['pageSize']) ? intval($query['pageSize']) : $this->defaultQuery['pageSize'];
        $status = isset($query['status']) ? $query['status'] : $this->defaultQuery['status'];

        $offset = ($page - 1) * $pageSize;

        $conditions = [];

        if (array_key_exists($status, $this->statusFilm)) {
            $conditions[] = $this->statusFilm[$status];
        }

        if (isset($query['genre'])) {
            $conditions[] = 'genre = :genre';
        }

        if (isset($query['search'])) {
            $conditions[] = 'title LIKE :title';
        }
        
        $whereClause = empty($conditions) ? '' : 'WHERE ' . implode(' AND ', $conditions);

        $finalQuery = 'SELECT * FROM ' . $this->table . ' ' . $whereClause . ' ' . ' LIMIT ' . $pageSize . ' OFFSET ' . $offset;

        $this->db->query($finalQuery);

        if (isset($query['genre'])) {
            $this->db->bind(':genre', ucfirst($query['genre']), PDO::PARAM_STR);
        }

        if (isset($query['search'])) {
            $searchTerm = '%' . $query['search'] . '%';
            $this->db->bind(':title', $searchTerm, PDO::PARAM_STR);
        }


        return $this->db->resultSet();
    }

    public function getCountData()
    {
        $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
        return $this->db->single();
    }

    public function getCountDataByFilter($query) {
        $status = isset($query['status']) ? $query['status'] : $this->defaultQuery['status'];

        $conditions = [];

        if (array_key_exists($status, $this->statusFilm)) {
            $conditions[] = $this->statusFilm[$status];
        }

        if (isset($query['genre'])) {
            $conditions[] = 'genre = :genre';
        }

        if (isset($query['search'])) {
            $conditions[] = 'title LIKE :title';
        }

        $whereClause = empty($conditions) ? '' : 'WHERE ' . implode(' AND ', $conditions);

        $finalQuery = 'SELECT COUNT(*) FROM ' . $this->table . ' ' . $whereClause;

        $this->db->query($finalQuery);

        if (isset($query['genre'])) {
            $this->db->bind(':genre', ucfirst($query['genre']), PDO::PARAM_STR);
        }

        if (isset($query['search'])) {
            $searchTerm = '%' . $query['search'] . '%';
            $this->db->bind(':title', $searchTerm, PDO::PARAM_STR);
        }

        return $this->db->single();
    }

    public function getRandomData($number = 5)
    {
        $totalRows = $this->getCountData()['count'];
        $limit = min($number, $totalRows);

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE end_date > current_timestamp AND trailer_url is NOT NULL ORDER BY RANDOM() LIMIT ' . $limit);

        return $this->db->resultSet();
    }

    public function getAllGenres()
    {
        $this->db->query('SELECT DISTINCT genre FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
