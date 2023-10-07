function handleLoginState(isLoggedIn) {
  const scheduleItem = document.querySelector(".nav-link-schedule");
  const historyItem = document.querySelector(".nav-link-history");
  const loginItem = document.querySelector(".nav-link-login");
  const registerButton = document.querySelector(".register-btn");
  const profileDropdown = document.querySelector(".profile-dropdown");

  if (isLoggedIn) {
    scheduleItem.style.display = "block";
    historyItem.style.display = "block";
    profileDropdown.style.display = "block";
    loginItem.style.display = "none";
    registerButton.style.display = "none";
  } else {
    scheduleItem.style.display = "none";
    profileDropdown.style.display = "none";
    historyItem.style.display = "none";
    loginItem.style.display = "block";
    registerButton.style.display = "block";
  }
}

function checkLoginStatus() {
  var xhr = new XMLHttpRequest();

  xhr.open("GET", "/login/checkLoginAjax", true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      try {
        var data = JSON.parse(xhr.responseText);
        const isLoggedIn = data.isLoggedIn;
        handleLoginState(isLoggedIn);
      } catch (error) {
        console.error("Error parsing JSON:", error);
      }
    } else {
      console.error("Request failed with status:", xhr.status);
    }
  };

  xhr.onerror = function () {
    console.error("Error checking login status:", xhr.statusText);
  };

  xhr.send();
}

document.addEventListener("DOMContentLoaded", () => {
  checkLoginStatus();
});

document
  .querySelector(".sign-out-link")
  .addEventListener("click", function (e) {
    e.preventDefault();

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "/logout/logoutAjax", true);

    xhr.onload = function () {
      if (xhr.status === 200) {
        try {
          var data = JSON.parse(xhr.responseText);
          checkLoginStatus();
        } catch (error) {
          console.error("Error parsing JSON:", error);
        }
      } else {
        console.error("Request failed with status:", xhr.status);
      }
    };

    xhr.onerror = function () {
      console.error("Error logging out:", xhr.statusText);
    };

    xhr.send();
  });
