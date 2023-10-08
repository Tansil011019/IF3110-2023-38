var keywordGenre = document.querySelector(".genres-film");
var keywordStatus = document.querySelector(".status-film");
var keywordSearch = document.querySelector(".search-bar")
var containerCardAll = document.querySelector(".discover-movie-data-container");

var currentGenre = keywordGenre.value;
var currentStatus = keywordStatus.value;
var currentSearch = keywordSearch.value;
var currentPage = 1;
var itemsPerPage = 12;

function updateMoviePage() {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      containerCardAll.innerHTML = xhr.responseText;
    }
  };

  xhr.open(
    "GET",
    "/movie?genre=" +
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

keywordGenre.addEventListener("change", function () {
  currentGenre = keywordGenre.value;
  currentStatus = keywordStatus.value;
  currentSearch = keywordSearch.value;

  currentPage = 1;
  updateMoviePage();
});

keywordStatus.addEventListener("change", function () {
  currentGenre = keywordGenre.value;
  currentStatus = keywordStatus.value;
  currentSearch = keywordSearch.value;

  currentPage = 1;
  updateMoviePage();
});

keywordSearch.addEventListener('input', () => {
  currentGenre = keywordGenre.value;
  currentStatus = keywordStatus.value;
  currentSearch = keywordSearch.value;
  
  currentPage = 1;
  updateMoviePage();
})

updateMoviePage();