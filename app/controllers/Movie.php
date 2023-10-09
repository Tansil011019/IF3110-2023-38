<?php

class Movie extends Controller {
    public function index() {
        $this->ajax('MovieAjax');
    }
 }