function login() {
    localStorage.setItem('isLoggedIn', 'true');

    handleLoginState();
}

function handleLoginState() {
    const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';

    const scheduleItem = document.querySelector('.nav-link-schedule');
    const historyItem = document.querySelector('.nav-link-history');
    const loginButton = document.querySelector('.login-btn');
    const profileDropdown = document.querySelector('.profile-dropdown');

    if (isLoggedIn) {
        scheduleItem.style.display = 'block';
        historyItem.style.display = 'block';
        profileDropdown.style.display = 'block';
        loginButton.style.display = 'none';
    } else {
        scheduleItem.style.display = 'none';
        profileDropdown.style.display = 'none';
        historyItem.style.display = 'none';
        loginButton.style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    handleLoginState();
});

document.querySelector('.sign-out-link').addEventListener('click', function (e) {
    e.preventDefault();
    localStorage.setItem('isLoggedIn', 'false');
    handleLoginState();
});
