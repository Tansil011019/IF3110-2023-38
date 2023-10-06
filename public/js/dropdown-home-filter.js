var keywordGenre = document.querySelector(".genres-film");
var keywordStatus = document .querySelector(".status-film")
var containerCard = document.querySelector(".container-bookin-data");

[keywordGenre, keywordStatus].forEach(function(keywordElmt) {
  keywordElmt.addEventListener("change", function () {
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        containerCard.innerHTML = xhr.responseText;
      }
    };
  
    xhr.open("GET", "/movie?genre=" + keywordGenre.value + "&status=" + keywordStatus.value, true);
    xhr.send();
  
  });
})
