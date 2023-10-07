<div class="body-payment-page">
    <div class="line-top-container">
        <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
    </div>

    <?php
    if (isset($_GET['movieId']) && isset($_GET['scheduleId']) && isset($_GET['scheduleDate']) && isset($_GET['amount'])) {
        $movieId = $_GET['movieId'];
        $scheduleId = $_GET['scheduleId'];
        $scheduleDate = $_GET['scheduleDate'];
        $amount = $_GET['amount'];
        $selectedMovie = $this->model('TicketModel')->getMovieById($movieId);
        $selectedSchedule = $this->model('TicketModel')->getScheduleById($scheduleId);
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
            <div class="payment-info-datetime"><?php echo $scheduleDate ?></div>
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
            <form action="/payment/submit" method="post">
                <input type="hidden" name="movieId" value="<?php echo $movieId ?>" />
                <input type="hidden" name="scheduleId" value="<?php echo $scheduleId ?>" />
                <input type="hidden" name="scheduleDate" value="<?php echo $scheduleDate ?>" />
                <input type="hidden" name="amount" value="<?php echo $amount ?>" />
                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice ?>" />
                <div class="payment-info-button-container">
                <button type="submit" class="payment-info-button">Pay</button>
            </div>
        </div>
    </div>
</div>
