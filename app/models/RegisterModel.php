<?php
class RegisterModel
{
    private $modelInfo = [
        "title" => "Register Page",
        "currentRoute" => "/register",
        "style" => "/public/css/login-register.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
