<div class="body-payment-page">
    <div class="line-top-container">
        <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
    </div>

    <?php
    if (isset($_GET['movieId']) && isset($_GET['scheduleId']) && isset($_GET['scheduleDate']) && isset($_GET['amount'])) {
        $movieId = $_GET['movieId'];
        $selectedMovie = $this->model('TicketModel')->getMovieById($movieId);
        
        $scheduleId = $_GET['scheduleId'];
        $selectedSchedule = $this->model('TicketModel')->getScheduleById($scheduleId);
        
        $scheduleDate = $_GET['scheduleDate'];
        $dateObject = DateTime::createFromFormat('l, d F Y', $scheduleDate);
        $formattedDate = $dateObject->format('l, j F Y');

        $amount = $_GET['amount'];
        $price = number_format($selectedSchedule['price'], 2, ',', '.');
        $totalPrice = number_format($selectedSchedule['price'] * $amount, 2, ',', '.');
    } else {
        
    }
    ?>

    <div class="payment-container">
        <div class="payment-page-container">
            <div>Choose Seats</div>
            <div class="payment-page-current">Purchase</div>
            <div>Complete</div>
        </div>
        <div class="line-payment-container">
            <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
        </div>
        <div class="payment-info-container">
            <div class="payment-info-title"><?php echo $selectedMovie['title'] ?></div>
            <div class="payment-info-datetime"><?php echo $formattedDate ?> - 13:45</div>
            <div class="line-payment-info-container">
                <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
            </div>
            <div class="payment-info-ticket-container">
                <div>Ticket Price</div>
                <div>Rp<?php echo $price ?> X <?php echo $amount ?></div>
            </div>
            <div class="line-payment-info-container">
                <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
            </div>
            <div class="payment-info-total-container">
                <div>Total Price</div>
                <div>Rp<?php echo $totalPrice ?></div>
            </div>
            <div class="button-buy">
                <form action="/complete" method="post">
                    <input type="hidden" name="scheduleId" value="<?php echo $scheduleId; ?>">
                    <input type="hidden" name="scheduleDate" value="<?php echo $scheduleDate; ?>">
                    <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                    <button type="submit">Buy Tickets</button>
                </form>
            </div>
        </div>
    </div>
</div>
