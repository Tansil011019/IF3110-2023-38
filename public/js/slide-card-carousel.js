const images = document.querySelectorAll(
  ".sliding-card-home-container .sliding-card-image img"
);
const dots = document.querySelector(".sliding-card-home-nav-dots");
const desc = document.querySelector(".sliding-card-home-nav-desc");
const nextButton = document.querySelector(
  ".sliding-card-home-nav-desc-movie-next-sliding-card-button"
);

const videoContainer = document.querySelector(".video-player-container");
const slideCardContainer = document.querySelector(".sliding-card-home-container")
const videoPlayer = document.querySelector(".video-player-container .video-player");

let speed = 3000;
let index = 0;
let intervalId;
let isPlayingVideo = false

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

  const watchMovieButton = document.querySelector(".sliding-card-home-nav-desc-movie-watch-movie-trailer-button")

  watchMovieButton.addEventListener("click", () => {
    if(!isPlayingVideo){
      clearInterval(intervalId);
      videoPlayer.src = JSON.parse(`"${images[index].getAttribute("movie-data-trailer-url")}"`);
      videoContainer.style.display = "block";
      slideCardContainer.style.display = "none";
      videoPlayer.play();
      isPlayingVideo = true;
    }
  })
});

videoPlayer.addEventListener("ended", ()=>{
  videoContainer.style.display="none";
  slideCardContainer.style.display = "block";
  isPlayingVideo = false;
  startInterval();
})

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

  const age_restriction = document.querySelector(
    ".sliding-card-home-nav-desc-movie-age-restriction"
  );
  age_restriction.textContent =
    images[index].getAttribute("movie-data-age-restriction") + "+";

  const duration = document.querySelector(
    ".sliding-card-home-nav-desc-movie-duration"
  );
  duration.textContent =
    images[index].getAttribute("movie-data-duration") + " min";

  const dots = document.querySelectorAll(".dot");
  dots.forEach((item) => item.classList.remove("active"));
  dots[index].classList.add("active");
}
