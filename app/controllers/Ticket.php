<!--  -->
<?php

class Ticket extends Controller {
    public function index() {
        $data['header'] = $this->model('TicketModel')->getHeader();

        $this->view('templates/header', $data);
        $this->view('ticket/index');
        $this->view('templates/footer');
    }
}