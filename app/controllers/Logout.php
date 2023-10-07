<?php

class Logout extends Controller {
    public function logOutAjax() {
        $this->ajax('LogoutAjax');
    }
}