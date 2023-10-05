<div class="main-container">
    <div class="head-container">
        Add Movie
    </div>
    <div class="input-field-container">
        <div class="left-side">
            <div class="movie-field">
                <div class="movie-title-label">
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
                <div class="movie-genre-label">
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
                <div class="movie-url-label">
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
                <div class="movie-desc-label">
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
        </div>
        <div class="right-side">
            <div class="duration-field">
                <div class="movie-duration-label">
                    Duration
                </div>
                <?php
                require_once 'app/views/libs/function/BookinInput.php';
                $inputProps = [
                    'name' => 'movie-duration',
                    'placeHolder' => "Input Duration",
                    'type' => 'number',
                ];
                $inputField = BookinInput($inputProps);
                echo $inputField;
                ?>
            </div>
            <div class="agelimit-field">
                <div class="movie-agelimit-label">
                    Age Limit
                </div>
                <?php
                require_once 'app/views/libs/function/BookinInput.php';
                $inputProps = [
                    'name' => 'movie-agelimit',
                    'placeHolder' => "Input Age Limit",
                    'type' => 'number',
                ];
                $inputField = BookinInput($inputProps);
                echo $inputField;
                ?>
            </div>
            <div class="select-trailer-poster-button">
                <div class="movie-trailer-button">
                    <div class="movie-trailer-label">
                        Select Movie Trailer
                    </div>
                    <input type="file" id="file-trailer-input" style="display: none;">
                    <button id="select-trailer-button" onclick="document.getElementById('file-trailer-input').click()">Select</button>
                    <span id="file-name"></span>
                    <script>
                        document.getElementById('file-trailer-input').addEventListener('change', function() {
                            var fileName = this.files[0].name;
                            var maxLength = 20; //max strings to display
                            if (fileName.length > maxLength) {
                                fileName = fileName.substring(0, maxLength) + '...';
                            }
                            document.getElementById('select-trailer-button').textContent = fileName;
                        });
                    </script>
                </div>
                <div class="movie-poster-button">
                    <div class="movie-poster-label">
                        Select Movie Poster
                    </div>
                    <input type="file" id="file-poster-input" style="display: none;">
                    <button id="select-poster-button" onclick="document.getElementById('file-poster-input').click()">Select</button>
                    <span id="file-name"></span>
                    <script>
                        document.getElementById('file-poster-input').addEventListener('change', function() {
                            var fileName = this.files[0].name;
                            var maxLength = 20; //max strings to display
                            if (fileName.length > maxLength) {
                                fileName = fileName.substring(0, maxLength) + '...';
                            }
                            document.getElementById('select-poster-button').textContent = fileName;
                        });
                    </script>
                </div>
            </div>
            <div class="url-thumbnail">
                <div class="movie-thubnail-label">
                    Select Movie Thumbnail
                </div>
                <input type="file" id="file-thumbnail-input" style="display: none;">
                <button id="select-thumbnail-button" onclick="document.getElementById('file-thumbnail-input').click()">Select</button>
                <span id="file-name"></span>
                <script>
                    document.getElementById('file-thumbnail-input').addEventListener('change', function() {
                        var fileName = this.files[0].name;
                        var maxLength = 20; //max strings to display
                        if (fileName.length > maxLength) {
                            fileName = fileName.substring(0, maxLength) + '...';
                        }
                        document.getElementById('select-thumbnail-button').textContent = fileName;
                    });
                </script>
            </div>
            <div class="select-limit-time">
                <div class="movie-start-time-button">
                    <div class="select-start-time-label">
                        Select a Start Date
                    </div>
                    <input type="date" id="start-date-input">
                    <span id="selected-date"></span>
                    <script>
                        function startSelectDate() {
                            var dateInput = document.getElementById('start-date-input');
                            dateInput.click();
                            dateInput.addEventListener('change', function() {
                                var selectedDate = this.value;
                                document.getElementById('selected-date').textContent = selectedDate;
                            });
                        }
                    </script>
                </div>
                <div class="movie-end-time-button">
                    <div class="select-start-time-label">
                        Select a End Date
                    </div>
                    <input type="date" id="end-date-input">
                    <span id="selected-date"></span>
                    <script>
                        function endSelectDate() {
                            var dateInput = document.getElementById('end-date-input');
                            dateInput.click();
                            dateInput.addEventListener('change', function() {
                                var selectedDate = this.value;
                                document.getElementById('selected-date').textContent = selectedDate;
                            });
                        }
                    </script>
                </div>
            </div>
            <div class="button-addMovie">
                <button id="add-movie">Add</button>
            </div>
        </div>
    </div>
</div>