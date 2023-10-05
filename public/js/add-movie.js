function startSelectDate() {
  var dateInput = document.getElementById("start-date-input");
  dateInput.click();
  dateInput.addEventListener("change", function () {
    var selectedDate = this.value;
    document.getElementById("selected-date").textContent = selectedDate;
  });
}

document
  .getElementById("file-trailer-input")
  .addEventListener("change", function () {
    var fileName = this.files[0].name;
    var maxLength = 20; //max strings to display
    if (fileName.length > maxLength) {
      fileName = fileName.substring(0, maxLength) + "...";
    }
    document.getElementById("select-trailer-button").textContent = fileName;
  });

document
  .getElementById("file-poster-input")
  .addEventListener("change", function () {
    var fileName = this.files[0].name;
    var maxLength = 20; //max strings to display
    if (fileName.length > maxLength) {
      fileName = fileName.substring(0, maxLength) + "...";
    }
    document.getElementById("select-poster-button").textContent = fileName;
  });

document
  .getElementById("file-thumbnail-input")
  .addEventListener("change", function () {
    var fileName = this.files[0].name;
    var maxLength = 20; //max strings to display
    if (fileName.length > maxLength) {
      fileName = fileName.substring(0, maxLength) + "...";
    }
    document.getElementById("select-thumbnail-button").textContent = fileName;
  });

function endSelectDate() {
  var dateInput = document.getElementById("end-date-input");
  dateInput.click();
  dateInput.addEventListener("change", function () {
    var selectedDate = this.value;
    document.getElementById("selected-date").textContent = selectedDate;
  });
}