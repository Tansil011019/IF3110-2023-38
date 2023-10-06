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
        <div class="container-bookin-data">
            <?php
            require_once 'app/views/components/home/discoverMoviesData.php'
            ?>
        </div>
        <div class="pagination-container">
            <?php
            require_once 'app/views/ui/bookinPagination.php'
            ?>
        </div>
    </div>
</div>