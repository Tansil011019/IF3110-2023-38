<div class="card-outer-container">
    <?php
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);
    $path = $parsedUrl['path'];
    if ($path == '/movie') {
        $href = '/ticket/?movieId=' . $datum['film_id'];
    } else if ($path == '/movieList') {
        $href = '/editmovie/?movieId=' . $datum['film_id'];
    }
    ?>
    <a href="<?php echo $href ?>">
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