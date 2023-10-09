<?php

class CustomerList extends Controller
{
    public function index()
    {
        $data['header'] = $this->model('CustomerListModel')->getHeader();
        $data['customer'] = $this->model('CustomerListModel')->

        $this->view('templates/header', $data);
        $this->view('customerList/index');
        $this->view('templates/footer');
    }
}
