<?php

class AddMovie extends Controller {
    public function index() {
        $data['header'] = $this->model('AddMovieModel')->getHeader();

        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    // Load addMovie.php
                    $this->view('templates/header', $data);
                    $this->view('addMovie/index');
                    $this->view('templates/footer');
                    exit;

                    break;
                case 'POST':
                    /* Lakukan validasi */
                    // Form tidak lengkap
                    if (!$_POST['title'] || !$_POST['artist'] || !$_POST['date'] || !$_POST['genre']) {
                        throw new LoggedException('Bad Request', 400);
                    }
                    // File tidak diisi
                    if ($_FILES['cover']['error'] === 4) {
                        throw new LoggedException('Bad Request', 400);
                    }

                    $albumModel = $this->model('AlbumModel');
                    $albumID = $albumModel->createAlbum($_POST['title'], $_POST['genre'], $_POST['description'], $_POST['age_restriction'], $_POST['duration'], $_POST['starting_date'], $_POST['end_date'], $_POST['trailer_url_youtube'], $_POST['poster_url'], $_POST['trailer_url'], $_POST['thumbnail_url']);

                    header("Location: /public/album/detail/$albumID", true, 301);
                    exit;

                    break;
                default:
                    throw new LoggedException('Method Not Allowed', 405);
            }
        } catch (Exception $e) {
            http_response_code($e->getCode());
            exit;
        }
    }
}