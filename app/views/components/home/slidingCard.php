<div class="sliding-card-home-container">
    <div class="sliding-card-image">
        <div class="sliding-card-image">
            <?php foreach ($data['slidingCardMovies'] as $index => $item) { ?>
                <img src="<?= $item['thumbnail_url'] ?>" data-desc="Image<?= $index + 1 ?>" alt="carousel image <?= $index + 1 ?>" class="<?= $index === 0 ? 'active' : '' ?>">
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
                <!-- dummy element -->
                <div class="sliding-card-home-nav-desc-today-movie-schedule-times">
                    <div class="sliding-card-home-nav-desc-today-movie-schedule-time">
                        11:45
                    </div>
                    <div class="sliding-card-home-nav-desc-today-movie-schedule-time">
                        13:45
                    </div>
                    <div class="sliding-card-home-nav-desc-today-movie-schedule-time">
                        15:45
                    </div>
                </div>
            </div>
            <div class="additional-desc-and-tools">
                <!-- dummy element -->
                <div class="sliding-card-home-nav-desc-movie-duration">
                    148 min
                </div>
                <!-- dummy element -->
                <div class="sliding-card-home-nav-desc-movie-age-restriction">
                    12+
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