<?php
class TicketModel
{
    private $db;

    private $modelInfo = [
        "title" => "Ticket Page",
        "currentRoute" => "/ticket",
        "style" => "/public/css/ticket.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMovieById($id)
    {
        $this->db->query('SELECT * FROM film WHERE film_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getAllSchedules($id)
    {
        $this->db->query('SELECT * FROM schedule WHERE film_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getScheduleById($id)
    {
        $this->db->query('SELECT * FROM schedule WHERE schedule_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}
