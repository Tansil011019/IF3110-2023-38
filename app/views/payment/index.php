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
                <button type="button" id="show-confirmation-modal">Buy Tickets</button>
            </div>

        </div>
    </div>
    <div id="confirmationModalBuy" class="modal-confirmation">
        <div class="modal-content">
            <div class="confirmation-label">
                Are you sure want to buy this ticket?
            </div>
            <div class="confirmation-button">
                <!-- Form dengan input hidden -->
                <form id="purchaseForm" action="/complete" method="post">
                    <input type="hidden" name="scheduleId" value="<?php echo $scheduleId; ?>">
                    <input type="hidden" name="scheduleDate" value="<?php echo $scheduleDate; ?>">
                    <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                    <button type="button" id="confirm-kick">Yes</button>
                </form>
                <!-- Tombol No -->
                <button type="button" id="cancel-kick">No</button>
            </div>
        </div>
    </div>
</div>

<script>
    var confirmButton = document.getElementById('confirm-kick');
    var purchaseForm = document.getElementById('purchaseForm');
    var buyButton = document.getElementById('show-confirmation-modal');
    var confirmationModal = document.getElementById('confirmationModalBuy');
    var cancelButton = document.getElementById('cancel-kick');

    // Tambahkan event listener untuk tombol "Yes"
    confirmButton.addEventListener('click', function() {

        purchaseForm.submit();
    });

    // Tambahkan event listener untuk tombol "Buy Tickets"
    buyButton.addEventListener('click', function() {
        confirmationModal.style.display = 'block';
    });

    // Sembunyikan modal saat tombol "No" pada modal ditekan
    cancelButton.addEventListener('click', function() {
        confirmationModal.style.display = 'none';
    });
</script>