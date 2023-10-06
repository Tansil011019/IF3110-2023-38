<?php
class TicketModel
{
    private $modelInfo = [
        "title" => "Ticket Page",
        "currentRoute" => "/ticket",
        "style" => "/public/css/ticket.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
