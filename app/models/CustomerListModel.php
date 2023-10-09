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

    public function getAllCustomer($query = []) {
        $page = isset($query['page']) ? max(1, intval($query['page'])) : $this->defaultQuery['page'];
        $pageSize = isset($query['pageSize']) ? intval($query['pageSize']) : $this->defaultQuery['pageSize'];

        $offset = ($page - 1) * $pageSize;

        $finalQuery = 'SELECT * FROM "' . $this->table . '" WHERE deleted_at IS NULL AND user_role=' . USER_ROLE['CUSTOMER'] . ' LIMIT ' . $pageSize . ' OFFSET ' . $offset;

        $this->db->query($finalQuery);

        return $this->db->resultSet();
    }

    public function getAllCustomerCount() {
        $finalQuery = 'SELECT COUNT(*) FROM "' . $this->table . '" WHERE deleted_at IS NULL AND user_role=' . USER_ROLE['CUSTOMER'];

        $this->db->query($finalQuery);

        return $this->db->single();
    }
}
