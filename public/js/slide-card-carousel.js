const images = document.querySelectorAll(
  ".sliding-card-home-container .sliding-card-image img"
);
const dots = document.querySelector(".sliding-card-home-nav-dots");
const desc = document.querySelector(".sliding-card-home-nav-desc");
const nextButton = document.querySelector(
  ".sliding-card-home-nav-desc-movie-next-sliding-card-button"
);

let speed = 3000;
let index = 0;
let intervalId;

images.forEach((image, i) => {
  const span = document.createElement("span");
  span.className = "dot";
  if (i === 0) {
    span.classList.add("active");
  }
  span.addEventListener("click", () => {
    index = i;
    startInterval();
    updateContent();
  });
  dots.appendChild(span);
});

nextButton.addEventListener("click", () => {
  index++;
  if (index === images.length) {
    index = 0;
  }
  startInterval();
  updateContent();
});

startInterval();
function startInterval() {
  if (intervalId) {
    clearInterval(intervalId);
  }

  intervalId = setInterval(() => {
    index++;
    if (index === images.length) {
      index = 0;
    }
    updateContent();
  }, speed);
}

updateContent();
function updateContent() {
  images.forEach((item) => item.classList.remove("active"));
  images[index].classList.add("active");

  const dots = document.querySelectorAll(".dot");
  dots.forEach((item) => item.classList.remove("active"));
  dots[index].classList.add("active");
}
