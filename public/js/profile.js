function editProfileImage() {
    var profileImage = document.getElementById('profileImage');
    var fileInput = document.getElementById('fileInput');

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            profileImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

function toggleEditName() {
    var currentContainer = document.getElementById('currentContainer');
    var editContainer = document.getElementById('editContainer');

    if (currentContainer.style.display !== 'none') {
        currentContainer.style.display = 'none';
        editContainer.style.display = 'flex';
    } else {
        currentContainer.style.display = 'flex';
        editContainer.style.display = 'none';
    }
}

function submitEditProfile() {
    var newNameInput = document.getElementById('newNameInput').value;

    if (newNameInput === '') {
        alert('New name cannot be empty');
    } else if (newNameInput.length > 100) {
        alert('New name cannot be longer than 100 characters');
    } else {
        document.getElementById('profileEditForm').submit();
    }
}
