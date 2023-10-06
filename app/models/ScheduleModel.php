<?php
class ScheduleModel
{
    private $film = 'film';
    private $transaction = 'transaction';
    private $db;

    private $modelInfo = [
        "title" => "Schedule Page",
        "currentRoute" => "/schedule",
        "style" => "/public/css/schedule.css",
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

    public function getAllTransactions()
    {
        $this->db->query('SELECT * FROM ' . $this->transaction);
        return $this->db->resultSet();
    }
}
