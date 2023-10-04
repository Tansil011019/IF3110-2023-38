function togglePasswordVisibility(toggleElement) {
  var passwordInput = toggleElement.previousElementSibling;

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleElement.innerHTML =
      '<img src="/public/icons/bookin-eye-closed-icon.svg" alt="closed-eye-icon">';
  } else {
    passwordInput.type = "password";
    toggleElement.innerHTML =
      '<img src="/public/icons/bookin-eye-open-icon.svg" alt="open-eye-icon">';
  }
}
