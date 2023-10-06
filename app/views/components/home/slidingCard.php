<?php
    require_once 'app/views/components/home/videoPlayer.php'
?>

<div class="sliding-card-home-container">
    <div class="sliding-card-image">
        <div class="sliding-card-image">
            <?php foreach ($data['slidingCardMovies'] as $index => $item) { ?>
                <img src="<?= $item['thumbnail_url'] ?>" data-desc="Image<?= $index + 1 ?>" alt="carousel image <?= $index + 1 ?>" class="<?= $index === 0 ? 'active' : '' ?>" movie-data-age-restriction=<?= json_encode($item['age_restriction']) ?> movie-data-duration=<?= json_encode($item['duration'])?> movie-data-trailer-url=<?= json_encode($item['trailer_url'])?>>
            <?php } ?>
        </div>
    </div>
    <div class="sliding-card-home-nav">
        <div class="sliding-card-home-nav-dots"></div>
        <div class="sliding-card-home-nav-desc">
            <div class="sliding-card-home-nav-desc-today-movie-schedule">
                <div class="sliding-card-home-nav-desc-today-movie-schedule-label">
                    Today:
                </div>
                <div class="sliding-card-home-nav-desc-today-movie-schedule-times">
                    <div class="sliding-card-home-nav-desc-today-movie-schedule-time">
                        13:45
                    </div>
                </div>
            </div>
            <div class="additional-desc-and-tools">
                <div class="sliding-card-home-nav-desc-movie-duration">
                </div>
                <div class="sliding-card-home-nav-desc-movie-age-restriction">
                </div>
                <div class="sliding-card-home-nav-desc-movie-watch-trailer">
                    <button class="sliding-card-home-nav-desc-movie-watch-movie-trailer-button">
                        <div class="button-text-description-watch-trailer">
                            Watch Trailer
                        </div>
                        <img src="/public/icons/bookin-play-video-button-ic.svg" alt="play button icon">
                    </button>
                </div>
                <div class="sliding-card-home-nav-desc-movie-next-sliding-card">
                    <button class="sliding-card-home-nav-desc-movie-next-sliding-card-button">
                        <img src="/public/icons/bookin-arrow-right-ic.svg" alt="arrow right icon">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/public/js/slide-card-carousel.js"></script>