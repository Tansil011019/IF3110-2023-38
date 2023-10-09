<?php
class AddMovieModel
{
    private $filmTable = 'film';
    private $scheduleTable = 'schedule';
    private $db;

    private $modelInfo = [
        "title" => "Add Movie",
        "currentRoute" => "/addMovie",
        "style" => "public/css/addMovie.css",
    ];

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createMovie($title, $genre, $description, $age_restriction, $duration, $starting_date, $end_date, $trailer_url_youtube, $poster_url) {
        $this->db->query('INSERT INTO "' . $this->filmTable . '" (title, genre, description, age_restriction, duration, starting_date, end_date, trailer_url_youtube, poster_url, created_by) VALUES (\'' . $title . '\', \'' . $genre . '\', \'' . $description . '\', \'' . $age_restriction . '\', \'' . $duration . '\', \'' . $starting_date . '\', \'' . $end_date . '\',  \'' . $trailer_url_youtube . '\' , \'' . $poster_url . '\' , \'' . $_SESSION['userId'] . '\')');
        $this->db->execute();
    }

    public function updateMovieTrailer($trailer_url) {
        $this->db->query('UPDATE "' . $this->filmTable . '" SET trailer_url = \'' . $trailer_url . '\', updated_by = \'' . $_SESSION['userId'] . '\' WHERE id = \'' . $_SESSION['movieId'] . '\'');
        $this->db->execute();
    }

    public function updateMovieThumbnail($thumbnail_url) {
        $this->db->query('UPDATE "' . $this->filmTable . '" SET thumbnail_url = \'' . $thumbnail_url . '\', updated_by = \'' . $_SESSION['userId'] . '\' WHERE id = \'' . $_SESSION['movieId'] . '\'');
        $this->db->execute();
    }
}
