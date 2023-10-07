<div class="main-container">
    <div class="head-container">
        Add Movie
    </div>
    <div class="input-field-container">
        <div class="left-side">
            <div class="title-field">
                <div class="addMovie-label">
                    Movies Title
                </div>
                <?php
                require_once 'app/views/libs/function/BookinInput.php';
                $inputProps = [
                    'name' => 'movie-title',
                    'placeHolder' => "Input Title",
                    'type' => 'text',
                ];
                $inputField = BookinInput($inputProps);
                echo $inputField;
                ?>
            </div>
            <div class="genre-field">
                <div class="addMovie-label">
                    Genre
                </div>
                <?php
                require_once 'app/views/libs/function/BookinInput.php';
                $inputProps = [
                    'name' => 'genre-movie',
                    'placeHolder' => "Input Genre",
                    'type' => 'text',
                ];
                $inputField = BookinInput($inputProps);
                echo $inputField;
                ?>
            </div>
            <div class="url-field">
                <div class="addMovie-label">
                    URL Trailer
                </div>
                <?php
                require_once 'app/views/libs/function/BookinInput.php';
                $inputProps = [
                    'name' => 'url-movie',
                    'placeHolder' => "Input URL",
                    'type' => 'url',
                ];
                $inputField = BookinInput($inputProps);
                echo $inputField;
                ?>
            </div>
            <div class="desc-fild">
                <div class="addMovie-label">
                    Description
                </div>
                <?php
                require_once 'app/views/libs/function/BookinInput.php';
                $inputProps = [
                    'name' => 'movie-desc',
                    'placeHolder' => "Text",
                    'type' => 'text',
                ];
                $inputField = BookinInput($inputProps);
                echo $inputField;
                ?>
            </div>
            <div class="movie-start-time-button">
                <div class="addMovie-label">
                    Select a Start Date
                </div>
                <input type="date" id="start-date-input">
                <span id="selected-start-date"></span>
                <script src="public\js\add-movie.js"></script>
            </div>
        </div>
        <div class="right-side">
            <div class="duration-and-agelimit-field">
                <div class="duration-field">
                    <div class="addMovie-label">
                        Duration
                    </div>
                    <?php
                    require_once 'app/views/libs/function/BookinInput.php';
                    $inputProps = [
                        'name' => 'movie-duration',
                        'placeHolder' => "Input Duration",
                        'type' => 'number',
                        'innerStyles' => '-duration',
                        'outerStyles' => '-duration'
                    ];
                    $inputField = BookinInput($inputProps);
                    echo $inputField;
                    ?>
                </div>
                <div class="agelimit-field">
                    <div class="addMovie-label">
                        Age Limit
                    </div>
                    <?php
                    require_once 'app/views/libs/function/BookinInput.php';
                    $inputProps = [
                        'name' => 'movie-agelimit',
                        'placeHolder' => "Input Age Limit",
                        'type' => 'number',
                        'innerStyles' => '-agelimit',
                        'outerStyles' => '-agelimit'
                    ];
                    $inputField = BookinInput($inputProps);
                    echo $inputField;
                    ?>
                </div>
            </div>


            <div class="fee-and-quota-field">
                <div class="fee-field">
                    <div class="addMovie-label">
                        Fee
                    </div>
                    <?php
                    require_once 'app/views/libs/function/BookinInput.php';
                    $inputProps = [
                        'name' => 'movie-fee',
                        'placeHolder' => "Input Fee",
                        'type' => 'number',
                        'innerStyles' => '-fee',
                        'outerStyles' => '-fee'
                    ];
                    $inputField = BookinInput($inputProps);
                    echo $inputField;
                    ?>
                </div>
                <div class="quota-field">
                    <div class="addMovie-label">
                        Quota
                    </div>
                    <?php
                    require_once 'app/views/libs/function/BookinInput.php';
                    $inputProps = [
                        'name' => 'movie-quota',
                        'placeHolder' => "Input quota",
                        'type' => 'number',
                        'innerStyles' => '-quota',
                        'outerStyles' => '-quota'
                    ];
                    $inputField = BookinInput($inputProps);
                    echo $inputField;
                    ?>
                </div>
            </div>


            <div class="select-trailer-poster-button">
                <div class="movie-trailer-button">
                    <div class="addMovie-label">
                        Select Movie Trailer
                    </div>
                    <input type="file" id="file-trailer-input" style="display: none;">
                    <button id="select-trailer-button" onclick="document.getElementById('file-trailer-input').click()">Select</button>
                    <span id="file-name"></span>
                    <script src="public\js\add-movie.js"></script>
                </div>
                <div class="movie-poster-button">
                    <div class="addMovie-label">
                        Select Movie Poster
                    </div>
                    <input type="file" id="file-poster-input" style="display: none;">
                    <button id="select-poster-button" onclick="document.getElementById('file-poster-input').click()">Select</button>
                    <span id="file-name"></span>
                    <script src="public\js\add-movie.js"></script>;
                </div>
            </div>
            <div class="url-thumbnail">
                <div class="addMovie-label">
                    Select Movie Thumbnail
                </div>
                <input type="file" id="file-thumbnail-input" style="display: none;">
                <button id="select-thumbnail-button" onclick="document.getElementById('file-thumbnail-input').click()">Select</button>
                <span id="file-name"></span>
                <script src="public\js\add-movie.js"></script>;
            </div>
            <div class="select-limit-time">
                <div class="movie-end-time-button">
                    <div class="addMovie-label">
                        Select an End Date
                    </div>
                    <input type="date" id="end-date-input">
                    <span id="selected-end-date"></span>
                    <script src="public\js\add-movie.js"></script>
                </div>
            </div>
            <div class="button-addMovie">
                <button id="add-movie">Add</button>
                <script src="public\js\add-movie.js"></script>
            </div>
        </div>
    </div>
</div>