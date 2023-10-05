<?php
class LoginModel
{
    private $modelInfo = [
        "title" => "Login Page",
        "currentRoute" => "/login",
        "style" => "/public/css/login-register.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
