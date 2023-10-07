<div class="card-outer-container">
    <a href="/ticket/?movieId=<?= $datum['film_id']; ?>">
        <div class="card-container">
                <div class="card-image">
                    <img src="<?= $datum['poster_url']; ?>" alt="card image">
                </div>
                <div class="card-description">
                    <div class="card-genre">
                        <?= $datum['genre']; ?>
                    </div>
                    <div class="card-movie-title">
                        <?= $datum['title']; ?>
                    </div>
                </div>
        </div>
    </a>
</div>
