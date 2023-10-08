<?php

require_once 'app/models/HomeModel.php';

$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';

$query = [];

if ($genre !== '') {
    $query['genre'] = $genre;
}

if ($status !== '') {
    $query['status'] = $status;
}

if ($page !== '') {
    $query['page'] = $page;
}

$HomeModel = new HomeModel();

$movies = $HomeModel->getMovieByQuery($query);
?>

<div class="container-grid-card-movies">
    <?php foreach ($movies as $datum) : ?>
        <?php require 'app/views/ui/bookinCard.php'; ?>
    <?php endforeach; ?>
</div>