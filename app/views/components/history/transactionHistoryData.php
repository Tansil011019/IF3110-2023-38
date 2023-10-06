<div class="container-grid-card-movies">

    <!-- TASK: READ TRANSACTION -> CHECK SCHEDULE -> CHECK MOVIE -> MAKE CARD -->
    <?php foreach ($data['movies'] as $datum) : ?>
        <?php require 'app/views/ui/bookinCard.php'; ?>
    <?php endforeach; ?>
    <!-- END OF TASK -->
    
</div>
<?php 
    require_once 'app/views/ui/bookinPagination.php'
?>