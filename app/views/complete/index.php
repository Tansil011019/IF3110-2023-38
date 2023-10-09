<div class="body-complete-page">
    <div class="line-top-container">
        <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
    </div>
    <div class="complete-container">
        <div class="complete-page-container">
            <div>Choose Seats</div>
            <div>Purchase</div>
            <div class="complete-page-current">Complete</div>
        </div>
        <div class="line-complete-container">
            <img src="/public/icons/bookin-line-transparent.svg" alt="Transparent Line" />
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $scheduleId = $_POST["scheduleId"];

            $scheduleDate = $_POST["scheduleDate"];
            $formattedDate = date("Y-m-d H:i:s", strtotime($scheduleDate . " 13:45"));

            $totalPrice = $_POST["totalPrice"];
            $formattedPrice = str_replace('.', '', $totalPrice);
            $formattedPrice = str_replace(',', '.', $formattedPrice);

        } else {
            echo "Form not submitted.";
        }
        ?>

        <?php
        try{
            $userId = $_SESSION['userId'];
            $this->model('CompleteModel')->createTransaction($scheduleId, $formattedDate, $formattedPrice, $userId);
            $transaction = $this->model('CompleteModel')->getTransactionID($scheduleId, $formattedDate, $formattedPrice, $userId);
            $status = "Completed";
        } catch (PDOException $error) {
            $status = "Failed";
        }
        ?>

        <script>
            var status = "<?php echo $status; ?>";
            if (status === "Completed") {
                alert("Transaction successful!");
            } else if (status === "Failed") {
                alert("Transaction failed!");
            }
        </script>

        <div class="complete-info-container">
            <div class="complete-info-title">Payment</div>
            <div class="complete-info-transaction-container">
                <div class="complete-info-transaction-title">Transaction Number</div>
                <div class="complete-info-transaction-value"><?php echo $transaction['transaction_id'] ?></div>
            </div>
            <div class="complete-info-order-container">
                <div class="complete-info-order-title">Order Time</div>
                <div class="complete-info-order-value"><?php echo $formattedDate ?></div>
            </div>
            <div class="complete-info-total-container">
                <div class="complete-info-total-title">Total Price</div>
                <div class="complete-info-total-value">Rp<?php echo $totalPrice ?></div>
            </div>
            <div class="complete-info-status-container">
                <div class="complete-info-status-title">Status</div>
                <div class="complete-info-status-value"><?php echo $status ?></div>
            </div>
            <div class="button-home">
                <a href="/home">Back to Home</a>
            </div>
        </div>
    </div>
</div>
