<?php

class CustomerList extends Controller
{
    public function index()
    {
        $data['header'] = $this->model('CustomerListModel')->getHeader();
        $data['customer'] = $this->model('CustomerListModel')->getAllCustomer();

        $this->view('templates/header', $data);
        $this->view('customerList/index', $data);
        $this->view('templates/footer');
    }

    public function customerListAjax() {
        $this->ajax('CustomerListAjax');
    }
}
