var kickButtons = document.querySelectorAll(".kick-customer");

kickButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    var customerId = this.getAttribute("data-customer-id");
    showModal(customerId);
  });
});

function showModal(customerId) {
  var modalId = "myModal-" + customerId;  
  var modal = document.getElementById(modalId);
  modal.style.display = "block";
}  

function hideModal(customerId) { 
  var modalId = "myModal-" + customerId;  
  var modal = document.getElementById(modalId);
  modal.style.display = "none";
}  

document.querySelectorAll("#cancel-kick").forEach(function (closeButton) { 
  closeButton.addEventListener("click", function () {
    var customerId = this.getAttribute("data-customer-id");
    hideModal(customerId);
  });
});

document.querySelectorAll("#confirm-kick").forEach(function (confirmButton) {
  confirmButton.addEventListener("click", function () {
    var customerId = this.getAttribute("data-customer-id");
    
    // Lakukan aksi pengeluaran pelanggan di sini
    
    hideModal(customerId);
  });
});