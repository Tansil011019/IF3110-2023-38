<div class="container-grid-card-movies">
    <?php foreach ($data['movies'] as $datum) : ?>
        <?php require 'app/views/ui/bookinCard.php'; ?>
    <?php endforeach; ?>
</div>