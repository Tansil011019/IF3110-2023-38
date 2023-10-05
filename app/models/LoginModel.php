<?php
class LoginModel
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db= new Database;
    }

    private $modelInfo = [
        "title" => "Login Page",
        "currentRoute" => "/login",
        "style" => "/public/css/login-register.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function getUser() {
        
    }
}
