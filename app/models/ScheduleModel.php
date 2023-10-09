<?php
class ScheduleModel
{
    private $modelInfo = [
        "title" => "Schedule Page",
        "currentRoute" => "/schedule",
        "style" => "/public/css/schedule.css",
    ];

    private $defaultQuery = [
        "page" => 1,
        "pageSize" => 12,
    ];

    private $table = 'film';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSchedule($query = []) {
        $page = isset($query['page']) ? max(1, intval($query['page'])) : $this->defaultQuery['page'];
        $pageSize = isset($query['pageSize']) ? intval($query['pageSize']) : $this->defaultQuery['pageSize'];

        $offset = ($page - 1) * $pageSize;

        $finalQuery = 'SELECT * FROM ' . $this->table . ' WHERE end_date > current_timestamp' . ' ORDER BY starting_date ASC' . ' LIMIT ' . $pageSize . ' OFFSET ' . $offset;

        $this->db->query($finalQuery);

        return $this->db->resultSet();
    }

    public function getAllScheduleCount() {
        $finalQuery = 'SELECT COUNT(*) FROM ' . $this->table . ' WHERE end_date > current_timestamp';
        
        $this->db->query($finalQuery);

        return $this->db->single();
    }

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
