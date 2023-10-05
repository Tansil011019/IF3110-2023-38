<!--  -->
<?php

class Complete extends Controller {
    public function index() {
        $headerData['title'] = 'Complete';
        $headerData['currentRoute'] = '/complete';
        $headerData['style'] = '/public/css/complete.css';

        $this->view('templates/header', $headerData);
        $this->view('complete/index');
        $this->view('templates/footer');
    }
}