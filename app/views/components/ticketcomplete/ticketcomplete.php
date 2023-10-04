<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/purchase.css">
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
            <div class="info-section">
                <div class=page-container>
                    <ul>
                        <li>
                            <div class="other-page">Choose Seats</a>
                        </li>
                        <li>
                            <div class="current-page">Purchase</a>
                        </li>
                        <li>
                            <div class="other-page">Complete</a>
                        </li>
                    </ul>
                </div>
                <div class="section-container">
                    <div class="line"><img src="/public/icons/grey-line.svg" /></div>
                    <h1>Inception</h1>
                    <h2>Thursday, 4 July - 12:00</h2>
                    <div class="line"><img src="/public/icons/grey-line.svg" /></div>
                    <div class="ticket-container">
                        <div class="label">Ticket Price</div>
                        <div class="value">Rp65.000,00 X 3</div>
                    </div>
                    <h4>Insert Token</h4>
                    <input type="text" class="token-input" placeholder="Text here" />
                    <div class="line"><img src="/public/icons/grey-line.svg" /></div>
                    <div class="total-container">
                        <div class="label">Total Price</div>
                        <div class="value">Rp195.000,00</div>
                    </div>
                    <button class="btn-ticket" onclick="showConfirmation()">Buy Tickets</button>
                </div>

                <div id="confirmationModal" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closeConfirmationModal()">&times;</span>
                        <p>Are you sure you want to buy tickets?</p>
                        <div class="popup-container">
                            <button onclick="buyTickets()">Yes</button>
                            <button onclick="closeConfirmationModal()">No</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- End of the header section -->
    <script src="/public/js/purchase.js"></script>
</body>
</html>