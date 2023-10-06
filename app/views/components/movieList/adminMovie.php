<div class="admin-movie-container">

    <?php
    $data['movieCount'] = implode($data['movieCount'][0]);
    ?>

    <?php
    $defaultAttribute = 'created_at';
    $defaultOrder = 'DESC';
    $chosenAttribute = isset($_SESSION['sortAttribute']) ? $_SESSION['sortAttribute'] : '';
    $chosenOrder = isset($_SESSION['sortOrder']) ? $_SESSION['sortOrder'] : '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['sortAttribute'])) {
            $chosenAttribute = $_POST['sortAttribute'];
            $_SESSION['sortAttribute'] = $chosenAttribute;
        }
        if (isset($_POST['sortOrder'])) {
            $chosenOrder = $_POST['sortOrder'];
            $_SESSION['sortOrder'] = $chosenOrder;
        }
    }

    if ($chosenAttribute != '' && $chosenOrder != '') {
        $data['movies'] = $this->model('MovieListModel')->getSortedMovies($chosenAttribute, $chosenOrder);
    } else {
        $data['movies'] = $this->model('MovieListModel')->getSortedMovies($defaultAttribute, $defaultOrder);
    }
    ?>

    <div class="admin-movie-header">
        <div class="admin-movie-title">
            Movie List
        </div>
        <div class="admin-movie-sorting-container">
            <form action="/movielist" method="post" id="sortForm">
                <div class="sort-attribute-dropdown">
                    <select id="sortAttribute" name="sortAttribute">
                        <option value="" disabled selected hidden>Sort By: </option>
                        <option value="created_at" <?php echo $chosenAttribute === 'created_at' ? 'selected' : ''; ?>>Default</option>
                        <option value="title" <?php echo $chosenAttribute === 'title' ? 'selected' : ''; ?>>Title</option>
                        <option value="genre" <?php echo $chosenAttribute === 'genre' ? 'selected' : ''; ?>>Genre</option>
                        <option value="age_restriction" <?php echo $chosenAttribute === 'age_restriction' ? 'selected' : ''; ?>>Age Rating</option>
                        <option value="duration" <?php echo $chosenAttribute === 'duration' ? 'selected' : ''; ?>>Duration</option>
                        <option value="starting_date" <?php echo $chosenAttribute === 'starting_date' ? 'selected' : ''; ?>>Starting Date</option>
                        <option value="end_date" <?php echo $chosenAttribute === 'end_date' ? 'selected' : ''; ?>>End Date</option>
                    </select>
                </div>
                <div class="sort-order-dropdown">
                    <select id="sortOrder" name="sortOrder">
                        <option value="" disabled selected hidden>Sort By: </option>
                        <option value="DESC" <?php echo $chosenOrder === 'DESC' ? 'selected' : ''; ?>>Descending</option>
                        <option value="ASC" <?php echo $chosenOrder === 'ASC' ? 'selected' : ''; ?>>Ascending</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="admin-movie-body">
        <?php
            require_once 'app/views/components/movieList/adminMovieData.php'
        ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the select elements
        var sortAttributeSelect = document.getElementById('sortAttribute');
        var sortOrderSelect = document.getElementById('sortOrder');

        // Add event listener for changes in sortAttribute
        sortAttributeSelect.addEventListener('change', function () {
            // Trigger the form submission
            document.getElementById('sortForm').submit();
        });

        // Add event listener for changes in sortOrder
        sortOrderSelect.addEventListener('change', function () {
            // Trigger the form submission
            document.getElementById('sortForm').submit();
        });
    });
</script>
