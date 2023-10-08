<?php
class ProfileModel
{
    private $table = 'user';
    private $db;

    private $modelInfo = [
        "title" => "Profile Page",
        "currentRoute" => "/profile",
        "style" => "/public/css/profile.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserInfo(){
        $this->db->query('SELECT * FROM "' . $this->table . '" WHERE user_id = \'' . $_SESSION['userId'] . '\'');        
        $this->db->execute();
        return $this->db->single();
    }

    public function updateProfileImage($image_url) {
        $this->db->query('UPDATE "' . $this->table . '" SET image_url = \'' . $image_url . '\', updated_by = \'' . $_SESSION['userId'] . '\' WHERE user_id = \'' . $_SESSION['userId'] . '\'');
        $this->db->execute();
    }

    public function updateProfileName($name){
        $this->db->query('UPDATE "' . $this->table . '" SET name = \'' . $name . '\', updated_by = \'' . $_SESSION['userId'] . '\' WHERE user_id = \'' . $_SESSION['userId'] . '\'');
        $this->db->execute();
    }
}
