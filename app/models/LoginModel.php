<?php
class LoginModel
{
    private $table = 'user';
    private $db;

    private $modelInfo = [
        "title" => "Login Page",
        "currentRoute" => "/login",
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

    public function getUser($email)
    {
        $this->db->query('SELECT * FROM "' . $this->table . '" WHERE email = ' . $email . ' AND deleted_at is NULL');
        return $this->db->single();
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['userId']);
    }

    public function isRoleAdmin()
    {
        return isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'];
    }

    public function isAdmin($user)
    {
        if ($this->isLoggedIn() && !strcmp($user['user_role'], USER_ROLE['ADMIN'])) {
            return true;
        }
        return false;
    }
}
