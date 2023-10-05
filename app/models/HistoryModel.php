<?php
class HistoryModel
{
    private $modelInfo = [
        "title" => "History Page",
        "currentRoute" => "/history",
        "style" => "/public/css/history.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
