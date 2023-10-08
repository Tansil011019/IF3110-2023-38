function updateMoviePageData() {
  var containerCardData = document.querySelector(".container-bookin-data");
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      containerCardData.innerHTML = xhr.responseText;
    }
  };

  xhr.open(
    "GET",
    "/movie/movieData?genre=" +
      currentGenre +
      "&status=" +
      currentStatus +
      "&page=" +
      currentPage +
      "&search=" +
      currentSearch,
    true
  );
  xhr.send();
}

function handlePreviousButton() {
  if (currentPage > 1) {
    currentPage = currentPage - 1;
    updateMoviePageData();
  }
}

function handleNextButton(max) {
  maxPage = max;
  if (currentPage < maxPage) {
    currentPage = currentPage + 1;
    updateMoviePageData();
  }
}

function handleNumberButton(index) {
  currentPage = index;
  updateMoviePageData();
}
