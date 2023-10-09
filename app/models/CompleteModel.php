<?php
class CompleteModel
{
    private $db;

    private $modelInfo = [
        "title" => "Complete Page",
        "currentRoute" => "/complete",
        "style" => "/public/css/complete.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createTransaction($scheduleId, $formattedDate, $formattedPrice, $userId)
    {
        $query = 'INSERT INTO transaction (schedule_id, order_time, total_price, created_by)';
        $query .= ' VALUES (\'' . $scheduleId . '\', \'' . $formattedDate . '\', ' . $formattedPrice . ', \'' . $userId . '\')';
        $this->db->query($query);
        $this->db->execute();
    }

    public function getTransactionID($scheduleId, $formattedDate, $formattedPrice, $userId)
    {
        $query = 'SELECT transaction_id FROM transaction WHERE schedule_id = \'' . $scheduleId . '\' AND order_time = \'' . $formattedDate . '\' AND total_price = ' . $formattedPrice . ' AND created_by = \'' . $userId . '\'';
        $this->db->query($query);
        $this->db->execute();
        $result = $this->db->single();
        return $result;
    }
}
