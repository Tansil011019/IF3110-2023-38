<?php
class AddMovieModel
{
    private $db;

    private $modelInfo = [
        "title" => "Add Movie",
        "currentRoute" => "/addMovie",
        "style" => "public/css/addMovie.css",
    ];

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getHeader()
    {
        return $this->modelInfo;
    }

    public function createMovie($title, $genre, $description, $age_restriction, $duration, $starting_date, $end_date, $trailer_url_youtube, $poster_url, $trailer_url, $thumbnail_url)
    {
        $query = 'INSERT INTO film (title, genre, description, age_restriction, duration, starting_date, end_date, trailer_url_youtube, poster_url, trailer_url, thumbnail_url) VALUES (title, genre, description, age_restriction, duration, starting_date, end_date, trailer_url_youtube, poster_url, trailer_url, thumbnail_url)';

        $this->db->query($query);
        $this->db->bind('title', $title);
        $this->db->bind('genre', $genre);
        $this->db->bind('description', $description);
        $this->db->bind('age_restriction', $age_restriction);
        $this->db->bind('duration', $duration);
        $this->db->bind('starting_date', $starting_date);
        $this->db->bind('end_date', $end_date);
        $this->db->bind('trailer_url_youtube', $trailer_url_youtube);
        $this->db->bind('poster_url', $poster_url);
        $this->db->bind('trailer_url', $trailer_url);
        $this->db->bind('thumbnail_url', $thumbnail_url);

        $this->db->execute();
    }
}
