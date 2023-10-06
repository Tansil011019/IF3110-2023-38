<!--  -->
<?php

class Complete extends Controller 
{
    public function index()
    {
        $data['header'] = $this->model('CustomerListModel')->getHeader();
        $data['header'] = $this->model('CompleteModel')->getHeader();

        $this->view('templates/header', $data);
        $this->view('complete/index');
        $this->view('templates/footer');
    }
}