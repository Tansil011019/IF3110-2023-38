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

    public function getAllCustomer() {

        $finalQuery = 'SELECT * FROM "' . $this->table . '" WHERE deleted_at IS NULL AND user_role=\'' . USER_ROLE['CUSTOMER'] . '\'';

        $this->db->query($finalQuery);

        return $this->db->resultSet();
    }

    public function deleteCustomer($email) {
        $finalQuery = 'UPDATE "' . $this->table . '" SET deleted_at=current_timestamp WHERE email=\'' . $email . '\'';

        $this->db->query($finalQuery);

        $this->db->execute();
    }
}
