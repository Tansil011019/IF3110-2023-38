<!--  -->
<?php

class Ticket extends Controller {
    public function index() {
        $headerData['title'] = 'Ticket';
        $headerData['currentRoute'] = '/ticket';
        $headerData['style'] = '/public/css/ticket.css';

        $this->view('templates/header', $headerData);
        $this->view('ticket/index');
        $this->view('templates/footer');
    }
}