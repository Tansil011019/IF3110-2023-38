<?php
class CustomerListModel
{
    private $modelInfo = [
        "title" => "Customer List Page",
        "currentRoute" => "/customerlist",
        "style" => "/public/css/customerList.css",
    ];

    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function getAllCustomer() {
        $finalQuery = 'SELECT * FROM "' . $this->table . '" WHERE deleted_at IS NOT NULL AND user_role=' . USER_ROLE['ADMIN'];
    }
}
