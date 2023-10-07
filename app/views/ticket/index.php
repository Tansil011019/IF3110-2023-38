<div class="body-ticket-page">
    <div class="line-top-container">
        <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
    </div>

    <?php
    if (isset($_GET['movieId'])) {
        $movieId = $_GET['movieId'];
        $selectedMovie = $this->model('TicketModel')->getMovieById($movieId);
        $movieSchedules = $this->model('TicketModel')->getAllSchedules($movieId);
        $startDate = new DateTime($selectedMovie['starting_date']);
        $endDate = new DateTime($selectedMovie['end_date']);
        $interval = $endDate->diff($startDate);
        $numDays = $interval->days + 1;

        for ($i = 0; $i < $numDays; $i++) {
            $currentDate = clone $startDate;
            $currentDate->modify('+' . $i . ' days');
            $currentDate = $currentDate->format('Y-m-d');
            $currentDate = date('l, d F Y', strtotime($currentDate));
            $movieSchedules[$i]['date'] = $currentDate;
        }

        if (isset($_GET['scheduleId'])) {
            $selectedSchedule = $this->model('TicketModel')->getScheduleById($_GET['scheduleId']);
        }
    } else {
        echo "Movie ID not found in the URL.";
    }
    ?>

    <div class="ticket-container">
        <div class="ticket-page-container">
            <div class="ticket-page-current">Choose Seats</div>
            <div>Purchase</div>
            <div>Complete</div>
        </div>
        <div class="line-ticket-container">
            <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
        </div>
        <div class="ticket-info-container">
            <div class="ticket-info-left-container">
                <div class="ticket-info-left-poster"><img src="<?echo $selectedMovie['poster_url']?>" alt="Movie Poster" /></div>
                <div class="ticket-info-left-button">
                    <a href="<?echo $selectedMovie['trailer_url_youtube']?>" target="_blank">
                        <img src="/public/icons/bookin-button-play.svg" alt="Play Button" />
                    </a>
                </div>
                <div class="ticket-info-left-genre-container">
                    <div class="ticket-info-left-genre-title">Genre</div>
                    <div><?echo $selectedMovie['genre']?></div>
                </div>
            </div>
            <div class="ticket-info-right-container">
                <div class="ticket-info-right-heading-container">
                    <div><?echo $selectedMovie['title']?></div>
                    <div class=ticket-info-right-heading-duration>
                        <img src="/public/icons/bookin-time.svg" alt="Duration Icon" />
                        <div><?echo $selectedMovie['duration']?> Minutes</div>
                    </div>
                </div>
                <div><?echo $selectedMovie['description']?></div>
                <div class="ticket-info-right-datetime-container">
                    <div class="ticket-info-right-date">
                        <div>Select Date</div>
                        <div class="line-datetime-container">
                            <img src="/public/icons/bookin-line-solid-1.svg" alt="Solid Line 1" />
                        </div>

                        <div class="ticket-info-schedule">
                            <select id="scheduleDropdown" name="schedule">
                                <?php if (!isset($_GET['scheduleId'])): ?>
                                    <option value="" disabled selected>Select a Date</option>
                                <?php endif; ?>
                                <?php foreach ($movieSchedules as $schedule): ?>
                                    <option value="<?php echo $schedule['schedule_id']; ?>" <?php echo (isset($_GET['scheduleId']) && $_GET['scheduleId'] == $schedule['schedule_id']) ? 'selected' : ''; ?>>
                                        <?php echo $schedule['date']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="button-text-border">
                            <button><?echo $selectedMovie['starting_date']?></Button>
                        </div>
                    </div>
                    <div class="ticket-info-right-time">
                        <div>Show Time</div>
                        <div class="line-datetime-container">
                            <img src="/public/icons/bookin-line-solid-2.svg" alt="Solid Line 2" />
                        </div>
                        <div class="ticket-info-right-time-container">
                            <div class="button-text-plain">
                                <button>13:45</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ticket-info-right-seating-container">
                    <img src="/public/icons/bookin-line-screen.svg" alt="Screen" />
                    <div class="ticket-info-right-seating-screen">SCREEN</div>
                    <div class="ticket-info-right-seating-available">
                        <?php if (!isset($_GET['scheduleId'])): ?>
                            No schedule selected
                        <?php endif; ?>
                        <?php if (isset($_GET['scheduleId'])): ?>
                            Available Seats <?echo $selectedSchedule['number_of_seats']?>
                        <?php endif; ?>
                    </div>
                    <img src="/public/icons/bookin-seats.svg" alt="Seats" />
                </div>
                <?php if (isset($_GET['scheduleId'])): ?>
                    <div class="ticket-info-right-purchase-container">
                        <div class="ticket-info-right-purchase-amount">
                            <div>
                                <label for="amount">Enter the number of seats to be booked</label>
                            </div>
                            <div class="input-amount">
                                <input type="number" id="amount" name="amount" value="0" />
                            </div>
                        </div>
                        <div class="button-next">
                            <button id="next">
                                <img src="/public/icons/bookin-button-next.svg" alt="Next Button" />
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var scheduleDropdown = document.getElementById('scheduleDropdown');

        scheduleDropdown.addEventListener('change', function () {
            var selectedScheduleId = this.value;
            var selectedScheduleDate = this.options[this.selectedIndex].text;
            var currentUrl = window.location.href;
            var newUrl = currentUrl.replace(/(\?|&)scheduleId=[^&]*/, '');
            newUrl += (newUrl.includes('?') ? '&' : '?') + 'scheduleId=' + selectedScheduleId + '&scheduleDate=' + selectedScheduleDate;
            window.location.href = newUrl;

            var selectedOption = document.querySelector(`#scheduleDropdown option[value="${selectedScheduleId}"]`);
            if (selectedOption) {
                selectedOption.selected = true;
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var amountInput = document.getElementById('amount');

        amountInput.addEventListener('input', function () {
            var minValue = 0;
            var maxValue = <?php echo $selectedSchedule['number_of_seats']; ?>;
            var currentValue = parseInt(this.value, 10);

            if (isNaN(currentValue)) {
                currentValue = minValue;
            }

            if (currentValue < minValue) {
                currentValue = minValue;
            } else if (currentValue > maxValue) {
                currentValue = maxValue;
            }

            this.value = currentValue;
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var next = document.getElementById('next');

        next.addEventListener('click', function () {
            var amount = document.getElementById('amount').value;
            if (amount == 0) {
                alert('Please enter the number of seats to be booked.');
                return;
            }
            var currentUrl = window.location.href;
            var newUrl = currentUrl.replace('/ticket', '/payment') + '&amount=' + amount;
            window.location.href = newUrl;
        });
    });
</script>
