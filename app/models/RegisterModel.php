<?php
class RegisterModel
{
    private $table = 'user';
    private $db;

    private $modelInfo = [
        "title" => "Register Page",
        "currentRoute" => "/register",
        "style" => "/public/css/login-register.css",
    ];

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function insertUser($fullName, $email, $hashedPassword){
        // echo 'INSERT INTO "' . $this->table . '" (name, password,email) VALUES (' . $fullName . ', ' . $hashedPassword . ', ' . $email . ')';
        $this->db->query('INSERT INTO "' . $this->table . '" (name, password,email) VALUES (' . $fullName . ', ' . $hashedPassword . ', ' . $email . ')');
        $this->db->execute();
    }
}
