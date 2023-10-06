<?php

require_once 'app/models/HomeModel.php';

$genre = isset($_GET['genre']) ? $_GET['genre'] : '';

$query=[];

if($genre !== ''){
    $query['genre'] = $genre;
}

$HomeModel = new HomeModel();

$movies = $HomeModel->getMovieByQuery($query);
?>

<div class="container-grid-card-movies">
    <?php foreach ($movies as $datum) : ?>
        <?php require 'app/views/ui/bookinCard.php'; ?>
    <?php endforeach; ?>
</div>