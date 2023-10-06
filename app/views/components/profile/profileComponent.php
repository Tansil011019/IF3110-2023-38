<script src="public\js\profile.js"></script>

<div class="main-container">
    <div class="left-side">
        <div class="profile-image-display">
            <img src="public/images/profile-picture-default.svg" alt="Gambar Profil" id="profile-image" />
        </div>
        <button id="changePhotoButton" onclick="document.getElementById('fileInput').click()">Change Your Profile</button>
        <input type="file" id="fileInput" style="display: none" accept="image/*" onchange="updateProfileImage()" />
    </div>
    <div class="right-side">
        <ul>
            <li><a>Name</a></li>
            <li>
                <b id="usernameLabel">Robert Downey Junior</b>
                <input type="text" id="usernameInput" style="display: none;" />
                <button id="changeUsername" onclick="toggleUsernameInput()"></button>
            </li>
            <li><a>Email</a></li>
            <li><b>robertdownjir@gmail.com</b></li>
        </ul>
    </div>
</div>