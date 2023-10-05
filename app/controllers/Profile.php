<?php

class Profile extends Controller {
    public function index() {
        $data['header'] = $this->model("ProfileModel")->getHeader();

        $this->view('templates/header', $data);
        $this->view('profile/index');
        $this->view('templates/footer');
    }
}