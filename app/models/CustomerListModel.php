<?php
class CustomerListModel
{
    private $modelInfo = [
        "title" => "Customer List Page",
        "currentRoute" => "/customerlist",
        "style" => "/public/css/customerList.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
