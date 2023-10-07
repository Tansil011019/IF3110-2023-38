<?php
class AddMovieModel
{
    private $modelInfo = [
        "title" => "Add Movie",
        "currentRoute" => "/addMovie",
        "style" => "public/css/addMovie.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }
}
