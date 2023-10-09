function startSelectDate() {
  var dateInput = document.getElementById("start-date-input");
  dateInput.click();
  dateInput.addEventListener("change", function () {
    var selectedDate = this.value;
    document.getElementById("selected-start-date").textContent = selectedDate;
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
    document.getElementById("selected-end-date").textContent = selectedDate;
  });
}

document.getElementById("add-movie").addEventListener("click", function () {
  var textInputs = document.getElementsByClassName("text-input");
  var textInputDuration = document.getElementsByClassName("text-input-duration");
  var textInputAgeLimit = document.getElementsByClassName("text-input-agelimit");
  var textInputFee = document.getElementsByClassName("text-input-fee");
  var textInputQuota = document.getElementsByClassName("text-input-quota");
  var startDateStr = document.getElementById("start-date-input").value;
  var endDateStr = document.getElementById("end-date-input").value;
  var posterFileInput = document.getElementById("file-poster-input");

  var startDate = new Date(startDateStr);
  var endDate = new Date(endDateStr);

  // check the four text inputs
  if (!textInputs[0].value) {
    alert("Input Judul wajib diisi.");
  } else if (!textInputs[1].value) {
    alert("Input Genre wajib diisi.");
  } else if (!textInputs[2].value) {
    alert("Input URL Trailer wajib diisi.");
  } else if (!textInputs[3].value) {
    alert("Input Deskripsi wajib diisi.");
  } else if (!textInputDuration[0].value) {
    alert("Input Durasi wajib diisi.");
  } else if (!textInputAgeLimit[0].value) {
    alert("Input Batas Usia wajib diisi.");
  } else if (!textInputFee[0].value) {
    alert("Input Harga wajib diisi.");
  } else if (!textInputQuota[0].value) {
    alert("Input Kuota wajib diisi.");
  } else if (!startDateStr) {
    alert("Input Tanggal Mulai wajib diisi.");
  } else if (!endDateStr) {
    alert("Input Tanggal Akhir wajib diisi.");
  } else if (startDate > endDate) {
    alert("Tanggal awal harus lebih kecil dari tanggal akhir.");
  } else if (!posterFileInput.files[0]) {
    alert("Input Poster wajib diisi.");
  } else {
    document.getElementById("add-movie-form").submit();
  }
});
