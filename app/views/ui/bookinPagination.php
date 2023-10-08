<div class="pagination-container">
    <button class="pagination-button pagination-previous-button" onclick="handlePreviousButton()">
        < </button>
    <?php
    for ($idxPage = 1; $idxPage <= ceil($data['movieCount'] / ITEMS_PER_PAGE_DESKTOP); $idxPage++) {

        $activeClass = ($idxPage === 1) ? 'active' : '';
        echo '<button class="pagination-button pagination-number-button ' . $activeClass .  '" data-page="' . $idxPage . '" onclick="handleNumberButton(' . $idxPage . ')">' . $idxPage . '</button>';
    }
    ?>
    <button class="pagination-button pagination-next-button" onclick="handleNextButton(<?= ceil($data['movieCount'] / ITEMS_PER_PAGE_DESKTOP) ?>)">
        >
    </button>
</div>