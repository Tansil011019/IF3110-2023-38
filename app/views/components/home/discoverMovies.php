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
                Here Will Be The Dropdown!
            </div>
        </div>
        <?php
            require_once 'app/views/components/home/discoverMoviesData.php'
        ?>
    </div>
</div>