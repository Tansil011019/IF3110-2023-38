<?php
class PaymentModel
{
    private $modelInfo = [
        "title" => "Payment Page",
        "currentRoute" => "/payment",
        "style" => "/public/css/payment.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}