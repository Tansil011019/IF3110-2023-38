<?php
class ProfileModel
{
    private $modelInfo = [
        "title" => "Profile Page",
        "currentRoute" => "/profile",
        "style" => "/public/css/profile.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
