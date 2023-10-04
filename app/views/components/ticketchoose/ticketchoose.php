<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/choose-seat.css">
</head>
<body>
    <header>
        <div class="wrapper">
            <nav>
                <div class="logo">Book.in</div>
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Schedule</a>
                    </li>
                    <li>
                        <a href="#">History</a>
                    </li>
                    <li>
                        <a href="#" class="btn-with-icon"><img src="/public/icons/profile.svg" alt="Profile" /></a>
                    </li>
                </ul>
            </nav>
            <!-- End of desktop navigation menu -->
            <div class="hero-section">
                <div class=page-container>
                    <ul>
                        <li>
                            <div class="current-page">Choose Seats</a>
                        </li>
                        <li>
                            <div class="other-page">Purchase</a>
                        </li>
                        <li>
                            <div class="other-page">Complete</a>
                        </li>
                    </ul>
                </div>
                <div class="line"><img src="/public/icons/grey-line.svg" /></div>
                <div class="section-container">
                    <div class="left">
                        <div class="container">
                            <img src="/public/images/poster.svg" alt="">

                            <!-- Play button with video ID -->
                            <a href="#" class="btn-with-icon overlay-button" data-video-id="1"><img src="/public/icons/play.svg" alt="Play" /></a>

                            <!-- Video modal -->
                            <div id="videoModal" class="modal">
                                <div class="video-container">
                                    <h5>Movie Trailer</h5>
                                    <span class="close" onclick="closeVideoModal()">&times;</span>
                                    <video id="videoPlayer" controls autoplay>
                                        <!-- Fallback content or initial source -->
                                        <source src="/public/videos/inception.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>

                        </div>
                        <div class="overlay-content">
                            <h1>Genre</h1>
                            <p>Sci-fi, Adventure, Drama</p>
                        </div>
                    </div>
                    <div class="right">
                        <h1>Inception</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <div class="container">
                            <div class="left-option">
                                <h2>Select Date</h2>
                                <div class="line"><img src="/public/icons/black-line.svg" /></div>
                                <button class="btn btn-with-border">Thursday, 4 July</Button>
                            </div>
                            <div class="right-option">
                                <h2>Show Time</h2>
                                <div class="line"><img src="/public/icons/black-line-2.svg" /></div>
                                <div class="time-container">
                                    <ul>
                                        <li>
                                            <button class="btn">10:00</Button>
                                        </li>
                                        <li>
                                            <button class="btn">12:00</Button>
                                        </li>
                                        <li>
                                            <button class="btn">15:00</Button>
                                        </li>
                                        <li>
                                            <button class="btn">19:00</Button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="seat-container" id="seatContainer"></div>
                        <script src="/public/js/choose-seat.js"></script>
                        <script>
                        // Generate seats with the repeating pattern
                        generateSeats(6, 'seatContainer'); // For example, repeat the pattern 5 times
                        </script>
                        <div class="icon-container">
                            <div class="center-icon">
                                <li><img src="/public/icons/available.svg" alt="Next" /></li>
                                <li>
                                    <div class="text">Available</div>
                                </li>
                                <li><img src="/public/icons/selected.svg" alt="Next" /></li>
                                <li>
                                    <div class="text">Selected</div>
                                </li>
                                <li><img src="/public/icons/taken.svg" alt="Next" /></li> 
                                <li>
                                    <div class="text">Taken</div>
                                </li>
                            </div>
                            <div class="right-icon">
                                <a href="#" class="btn-with-icon next-btn"><img src="/public/icons/next.svg" alt="Next" /></a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of the header section -->
</body>
</html>