<?php

class CustomerList extends Controller
{
    public function index($query = [])
    {
        $data['header'] = $this->model('CustomerListModel')->getHeader();
        $data['customer'] = $this->model('CustomerListModel')->getAllCustomer($query);
        $data['customerCount'] = $this->model('CustomerListModel')->getAllCustomerCount();

        $this->view('templates/header', $data);
        $this->view('customerList/index', $data);
        $this->view('templates/footer');
    }
}
