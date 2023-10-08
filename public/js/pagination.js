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
      currentPage,
    true
  );
  xhr.send();
}

function handlePreviousButton() {
  console.log("previous");
  console.log(currentPage);
  if (currentPage > 1) {
    currentPage = currentPage - 1;
    updateMoviePageData();
  }
}

function handleNextButton(max) {
  console.log("next");
  maxPage = max;
  if (currentPage < maxPage) {
    currentPage = currentPage + 1;
    console.log(currentPage);
    updateMoviePageData();
  }
}

function handleNumberButton(index) {
  console.log(index);
  currentPage = index;
  updateMoviePageData();
}
