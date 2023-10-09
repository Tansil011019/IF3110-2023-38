var currentPage = 1;

function updateSchedulePageData() {
    var containerCardScheduleData = document.querySelector(".schedule-container-bookin-data");
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        containerCardScheduleData.innerHTML = xhr.responseText;
      }
    };
  
    xhr.open(
      "GET",
      "/schedule/scheduleAjax?page=" +
        currentPage,
      true
    );
    xhr.send();
  }
  
  function handlePreviousButton() {
    if (currentPage > 1) {
      currentPage = currentPage - 1;
      updateSchedulePageData();
    }
  }
  
  function handleNextButton(max) {
    maxPage = max;
    if (currentPage < maxPage) {
      currentPage = currentPage + 1;
      updateSchedulePageData();
    }
  }
  
  function handleNumberButton(index) {
    currentPage = index;
    updateSchedulePageData();
  }
  