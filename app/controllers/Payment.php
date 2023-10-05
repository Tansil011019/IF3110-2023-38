<!--  -->
<?php

class Payment extends Controller {
    public function index() {
        $headerData['title'] = 'Payment';
        $headerData['currentRoute'] = '/payment';
        $headerData['style'] = '/public/css/payment.css';

        $this->view('templates/header', $headerData);
        $this->view('payment/index');
        $this->view('templates/footer');
    }
}