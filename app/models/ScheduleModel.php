<?php
class ScheduleModel
{
    private $modelInfo = [
        "title" => "Schedule Page",
        "currentRoute" => "/schedule",
        "style" => "/public/css/schedule.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
