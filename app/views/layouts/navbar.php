<nav class="navbar">
    <a href="#" class="logo">
        <h1 class="logo">
            <div class="blur-box"></div>
            Book.in
        </h1>
    </a>
    <div class="navbar-menu">
        <ul class="nav__link">
            <li class="nav-link-home <?= $data['header']['currentRoute'] === "/home" ? "active" : "" ?>"><a href="/home">Home</a></li>
            <li class="nav-link-schedule <?= $data['header']['currentRoute'] === "/schedule" ? "active" : "" ?>"><a href="/schedule">Schedule</a></li>
            <li class="nav-link-history <?= $data['header']['currentRoute'] === "/history" ? "active" : "" ?>"><a href="/history">History</a></li>
            <li class="nav-link-login <?= $data['header']['currentRoute'] === "/login" ? "active" : "" ?>"><a href="/login">Login</a></li>
            <li class="nav-link-add-movie <?= $data['header']['currentRoute'] === "/addMovie" ? "active" : "" ?>"><a href="/addMovie">Add Movie</a></li>
            <li class="nav-link-customer-list <?= $data['header']['currentRoute'] === "/customerList" ? "active" : "" ?>"><a href="/customerList">Customer List</a></li>
            <li class="nav-link-movie-list <?= $data['header']['currentRoute'] === "/movieList" ? "active" : "" ?>"><a href="/movieList">Movie List</a></li>
        </ul>
        <form action="/register">
            <button class="register-btn" type="submit">Register</button>
        </form>
        <div class="profile-dropdown">
            <button class="dropbtn">
                <img src="/public/icons/bookin-profile-ic.svg" alt="bookin profile icon">
            </button>
            <ul class="profile__link">
                <li class="profile-link-profile">
                    <a href="/profile">
                        <div class="profile-menu-content content">
                            <img src="/public/icons/bookin-profile-ic-without-bg.svg" alt="bookin profile icon without background">
                            <span>Profile</span>
                        </div>
                    </a>
                </li>
                <li class="profile-link-signout">
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

<script src="/public/js/navbar-register.js"></script>