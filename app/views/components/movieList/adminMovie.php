<div class="admin-movie-container">
    <div class="admin-movie-header">
        <div class="admin-movie-title">
            Movie List
        </div>
        <div class="admin-movie-sorting-container">
            <div class="sort-attribute-dropdown">
                <button>Sort By:</button>
            </div>
            <div class="sort-order-dropdown">
                <button>Sort Order:</button>
            </div>
        </div>
    </div>
    <div class="admin-movie-body">
        <?php
            require_once 'app/views/components/movieList/adminMovieData.php'
        ?>
    </div>
</div>