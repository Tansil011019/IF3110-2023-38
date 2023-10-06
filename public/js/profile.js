function updateProfileImage() {
    var fileInput = document.getElementById('fileInput');
    var profileImage = document.getElementById('profile-image');

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            profileImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

function toggleUsernameInput() {
    var usernameLabel = document.getElementById('usernameLabel');
    var usernameInput = document.getElementById('usernameInput');
    var changeUsernameButton = document.getElementById('changeUsername');

    if (usernameLabel.style.display === 'none') {
        // Jika input field sedang ditampilkan, ubah ke teks label
        var newUsername = usernameInput.value.trim(); // Menghapus ekstra spasi
        if (newUsername !== "") {
            if (newUsername.length <= 25) {
                usernameLabel.innerText = newUsername;
                usernameLabel.style.display = 'inline';
                usernameInput.style.display = 'none';
                changeUsernameButton.innerText = '';
            } else {
                alert("Username is too long. Maximum length is 25 characters.");
            }
        } else {
            alert("Username cannot be empty.");
        }
    } else {
        // Jika label sedang ditampilkan, ubah ke input field
        usernameInput.value = usernameLabel.innerText;
        usernameLabel.style.display = 'none';
        usernameInput.style.display = 'inline';
        changeUsernameButton.innerText = '';
    }
}

