<?php
class CompleteModel
{
    private $modelInfo = [
        "title" => "Complete Page",
        "currentRoute" => "/complete",
        "style" => "/public/css/complete.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
