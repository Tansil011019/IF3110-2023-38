<div class="container-grid-card-movies">
    <?php foreach ($data as $datum) : ?>
        <?php require 'app/views/ui/bookinCard.php'; ?>
    <?php endforeach; ?>
</div>
<?php 
    require_once 'app/views/ui/bookinPagination.php'
?>