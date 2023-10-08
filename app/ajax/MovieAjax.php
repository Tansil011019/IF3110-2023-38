<?php

require_once 'app/models/HomeModel.php';

$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

$query = [];

if ($genre !== '') {
    $query['genre'] = $genre;
}

if ($status !== '') {
    $query['status'] = $status;
}

$HomeModel = new HomeModel();

$movieCount = $HomeModel->getCountDataByFilter($query)['count'];
$movies = $HomeModel->getMovieByQuery($query);
var_dump($movieCount)
?>

<div class="container-bookin-data">
    <div class="container-grid-card-movies">
        <?php foreach ($movies as $datum) : ?>
            <?php require 'app/views/ui/bookinCard.php'; ?>
        <?php endforeach; ?>
    </div>
</div>
<div class="pagination-container">
    <button class="pagination-button pagination-previous-button" onclick="handlePreviousButton()">
        < </button>
    <?php
    for ($idxPage = 1; $idxPage <= ceil($movieCount / ITEMS_PER_PAGE_DESKTOP); $idxPage++) {

        $activeClass = ($idxPage === 1) ? 'active' : '';
        echo '<button class="pagination-button pagination-number-button ' . $activeClass .  '" data-page="' . $idxPage . '" onclick="handleNumberButton(' . $idxPage . ')">' . $idxPage . '</button>';
    }
    ?>
    <button class="pagination-button pagination-next-button"  onclick="handleNextButton(<?=ceil($movieCount / ITEMS_PER_PAGE_DESKTOP) ?>)">
        >
    </button>
</div>