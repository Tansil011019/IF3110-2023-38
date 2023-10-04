// Function to show the confirmation modal
function showConfirmation() {
    var modal = document.getElementById('confirmationModal');
    modal.style.display = 'block';
  }
  
  // Function to close the confirmation modal
  function closeConfirmationModal() {
    var modal = document.getElementById('confirmationModal');
    modal.style.display = 'none';
  }
  
  // Function to handle buying tickets
  function buyTickets() {
    // Add logic here to perform the actual purchase
    alert('Tickets purchased successfully!');
    // Close the modal after purchase
    closeConfirmationModal();
  }
  