<nav class="navbar">
    <h1 class="logo">
        <div class="blur-box"></div>
        Book.in
    </h1>
    <!-- <a href="#" class="logo">
        <img class="navbar-logo" src="/public/images/bookin-logo.svg" alt="bookin logo">
    </a> -->
    <div class="navbar-menu">
        <ul class = "nav__link">
            <li class = "nav-link-home <?= $data['currentRoute'] === "/home" ? "active" : "" ?>"><a href="/home">Home</a></li>
            <li class = "nav-link-login <?= $data['currentRoute'] === "/login" ? "active" : "" ?>"><a href="/login">login</a></li>
            <li class = "nav-link-schedule <?= $data['currentRoute'] === "/schedule" ? "active" : "" ?>"><a href="/schedule">Schedule</a></li>
            <li class = "nav-link-history <?= $data['currentRoute'] === "/history" ? "active" : "" ?>"><a href="/history">History</a></li>
        </ul>
        <button class="register-btn" onclick="login()">Register</button>
        <div class="profile-dropdown">
            <button class="dropbtn">
                <img src="/public/icons/bookin-profile-ic.svg" alt="bookin profile icon">   
            </button>
            <ul class = "profile__link">
                <li class = "profile-link-profile">
                    <a href="#">
                        <div class="profile-menu-content content">
                            <img src="/public/icons/bookin-profile-ic-without-bg.svg" alt="bookin profile icon without background">
                            <span>Profile</span>
                        </div>
                    </a>
                </li>
                <li class = "profile-link-signout">
                    <a href="#" class="sign-out-link">
                        <div class="sign-out-menu-content content">
                            <img src="/public/icons/bookin-sign-out-ic.svg" alt="bookin sign out icon">
                            <span>Sign Out</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="line"></div>

<script src="/public/js/navbar-login.js"></script>