var keywordGenre = document.querySelector(".genres");
var containerCard = document.querySelector(".container-bookin-data");

keywordGenre.addEventListener("change", function () {
    console.log(window.location.href)
    console.log(keywordGenre.value)
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      containerCard.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", "/movie?genre=" + keywordGenre.value, true);
  xhr.send();

});
