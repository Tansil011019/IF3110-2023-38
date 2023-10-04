<?php

class CustomerList extends Controller {
    public function index() {
        $headerData['title'] = 'Customer List';
        $headerData['currentRoute'] = '/customerlist';
        $headerData['style'] = 'public/css/customerList.css';

        $this->view('templates/header', $headerData);
        $this->view('customerList/index');
        $this->view('templates/footer');
    }
}