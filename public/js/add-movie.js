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
  var startDateStr = document.getElementById("start-date-input").value;
  var endDateStr = document.getElementById("end-date-input").value;
  var posterFileInput = document.getElementById("file-poster-input");
  var thumbnailFileInput = document.getElementById("file-thumbnail-input");

  var startDate = new Date(startDateStr);
  var endDate = new Date(endDateStr);

  if (startDate > endDate) {
    alert("Tanggal awal harus lebih kecil dari tanggal akhir.");
  } else if (!posterFileInput.files[0]) {
    alert("Input Poster wajib diisi.");
  } else if (!thumbnailFileInput.files[0]) {
    alert("Input Thumbnail wajib diisi.");
  } else { // yang berhasil
    // Lakukan pengiriman data atau tindakan lain di sini jika semua valid.
  }
});
