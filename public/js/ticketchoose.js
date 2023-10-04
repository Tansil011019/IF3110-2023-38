// Seat Handler
// Function to generate seat HTML for a row
function generateRow(container, leftSeats, middleSeats, rightSeats) {
  // Left area with seats
  for (let i = 0; i < leftSeats; i++) {
    const seat = createSeat();
    container.appendChild(seat);
  }

  // Space between left and middle
  container.appendChild(createSpace());

  // Middle area with seats
  for (let i = 0; i < middleSeats; i++) {
    const seat = createSeat();
    container.appendChild(seat);
  }

  // Space between middle and right
  container.appendChild(createSpace());

  // Right area with seats
  for (let i = 0; i < rightSeats; i++) {
    const seat = createSeat();
    container.appendChild(seat);
  }
}
  
// Function to create a seat div
function createSeat() {
  const seatDiv = document.createElement('div');
  seatDiv.className = 'seat';
  
  const seatImage = document.createElement('img');
  seatImage.src = '/public/icons/available.svg';
  seatImage.alt = 'Available Seat';

  seatDiv.appendChild(seatImage);
  return seatDiv;
}

// Function to create a space div
function createSpace() {
  const spaceDiv = document.createElement('div');
  spaceDiv.style.width = '20px';
  return spaceDiv;
}

// Function to generate seats with the repeating pattern
function generateSeats(repeatCount, containerId) {
  const container = document.getElementById(containerId);

  for (let i = 0; i < repeatCount; i++) {
    generateRow(container, 3, 10, 3); // Example: 3 seats on the left, 10 in the middle, 3 on the right
  }
}

// Function to open the video modal
function openVideoModal(videoId) {
  // Get the video source URL based on the video ID
  const videoSrc = `/public/videos/filename.mp4`; // Replace with your actual video source

  // Set the video source dynamically
  const videoPlayer = document.getElementById('videoPlayer');
  videoPlayer.src = videoSrc;

  // Show the modal
  document.getElementById('videoModal').style.display = 'flex';
}

// Function to close the video modal
function closeVideoModal() {
  // Hide the modal
  document.getElementById('videoModal').style.display = 'none';

  // Pause the video
  const videoPlayer = document.getElementById('videoPlayer');
  videoPlayer.pause();
}

// Attach click event to the play button
document.querySelector('.overlay-button').addEventListener('click', function() {
  // Get the video ID from the data attribute
  const videoId = this.getAttribute('data-video-id');

  // Open the video modal
  openVideoModal(videoId);
});