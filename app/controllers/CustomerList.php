<?php

class CustomerList extends Controller
{
    public function index()
    {
        $data['header'] = $this->model('CustomerListModel')->getHeader();

        $this->view('templates/header', $data);
        $this->view('customerList/index');
        $this->view('templates/footer');
    }
}
