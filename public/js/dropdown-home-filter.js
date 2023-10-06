var keywordGenre = document.querySelector(".dropdown-btn-genres");
var containerCard = document.querySelector(".container-bookin-card");

keywordGenre.addEventListener("change", function () {
    console.log(window.location.href)
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      containerCard.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "/movie?genre=" + keywordGenre.value, true);
  xhr.send();

});
