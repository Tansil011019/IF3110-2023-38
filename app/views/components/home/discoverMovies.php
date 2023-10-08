<div class="discover-movie-container">
    <div class="discover-movie-header">
        <div class="discover-movie-title">
            Discover Movies
        </div>
        <div class="discover-movie-search-bar">
            <?php
            require_once 'app/views/libs/function/BookinInput.php';

            $inputProps = [
                'name' => 'discover-movies-search-bar',
                'placeHolder' => "Search Movie",
            ];

            $inputField = BookinInput($inputProps);

            echo $inputField;
            ?>
        </div>
    </div>
    <div class="discover-movie-body">
        <div class="discover-movie-filter">
            <div class="discover-movie-filter-label">
                Sort By:
            </div>
            <div class="discover-movie-filter-dropdown">
                <div class="discover-movie-status-filter">
                    <?php
                    require_once 'app/views/libs/function/BookinDropdown.php';

                    $selectField = BookinDropdown('status', $data['dropdown-status'], 'status-film');

                    echo $selectField;
                    ?>
                    <img src="/public/icons/bookin-arrow-down-dropdown-ic.svg" alt="bookin array down dropdown icon">
                </div>
                <div class="discover-movie-genre-filter">
                    <?php
                    require_once 'app/views/libs/function/BookinDropdown.php';

                    $selectField = BookinDropdown('genre', $data['dropdown-genres'], 'genres-film', 'All Genres');

                    echo $selectField;
                    ?>
                    <img src="/public/icons/bookin-arrow-down-dropdown-ic.svg" alt="bookin array down dropdown icon">
                </div>
            </div>
        </div>
        <div class="discover-movie-data-container">
            <div class="container-bookin-data">
                <div class="container-grid-card-movies">
                    <?php foreach ($data['movies'] as $datum) : ?>
                        <?php require 'app/views/ui/bookinCard.php'; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
                require_once 'app/views/ui/bookinPagination.php';
            ?>
        </div>
    </div>

    <script src="/public/js/dropdown-home-filter.js"></script>
    <script src="/public/js/pagination.js"></script>