<?php

class Payment extends Controller 
{
    public function index() 
    {
        $data['header'] = $this->model('PaymentModel')->getHeader();

        $this->view('templates/header', $data);
        $this->view('payment/index');
        $this->view('templates/footer');
    }
}