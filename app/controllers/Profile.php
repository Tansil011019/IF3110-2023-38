<?php

class Profile extends Controller {
    public function index() {
        $headerData['title'] = 'Profile';
        $headerData['currentRoute'] = '/profile';
        $headerData['style'] = '/public/css/profile.css';

        $this->view('templates/header', $headerData);
        $this->view('profile/index');
        $this->view('templates/footer');
    }
}