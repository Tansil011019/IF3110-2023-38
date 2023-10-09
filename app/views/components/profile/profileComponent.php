<div class="profile-main-container">
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['fileInput'])) {
            $file_name = $_FILES['fileInput']['name'];
            $file_size = $_FILES['fileInput']['size'];
            $file_type = $_FILES['fileInput']['type'];
            $file_tmp = $_FILES['fileInput']['tmp_name'];
            $destinationDir = '/var/www/html/public/images/';
            move_uploaded_file($file_tmp, $destinationDir . $file_name);
            $image_url = '/public/images/' . $file_name;
            try{
                $this->model('ProfileModel')->updateProfileImage($image_url);
                $imageStatus = "Completed";
            } catch (PDOException $error) {
                $imageStatus = "Failed";
            }
        }
        $new_name = $_POST['newNameInput'];
        try{
            $this->model('ProfileModel')->updateProfileName($new_name);
            $nameStatus = "Completed";
        } catch (PDOException $error) {
            $nameStatus = "Failed";
        }
    }
    ?>

    <?php
    $user = $this->model('ProfileModel')->getUserInfo();
    ?>

    <form action="/profile" method="post" id="profileEditForm" enctype="multipart/form-data">
        <div class="profile-left-container">
            <div class="profile-image-display">
                <?php
                if ($user['profile_picture_url'] != null) {
                    echo '<img src="' . $user['profile_picture_url'] . '" alt="Profile Image" id="profileImage" />';
                } else {
                    echo '<img src="/public/images/profile-picture-default.svg" alt="Profile Image" id="profileImage" />';
                }
                ?>
            </div>
            <div class="profile-image-button">
                <button type="button" id="editImageButton" onclick="document.getElementById('fileInput').click()">Edit Profile Image</button>
            </div>
            <div class="profile-image-input">
                <input type="file" id="fileInput" name="fileInput" style="display: none" accept="image/*" onchange="editProfileImage()" />
            </div>
        </div>
        <div class="profile-right-container">
            <div class="profile-current-name-container" id="currentContainer">
                <div class="profile-current-name-labelvalue-container">
                    <div class="profile-current-name-label">
                        Name
                    </div>
                    <div class="profile-current-name-value" id="currentName">
                        <?php echo $user['name'] ?>
                    </div>
                </div>
                <div class="profile-name-edit-button">
                    <button type="button" id="editNameButton" onclick="toggleEditName()">
                        <img src="/public/icons/bookin-pencil-solid.svg" alt="Edit Name" />
                    </button>
                </div>
            </div>

            <div class="profile-edit-name-container" id="editContainer" style="display: none">
                <div class="profile-edit-name-labelinput-container">
                    <div class="profile-new-name-label">
                        <label for="newNameInput">New Name</label>
                    </div>
                    <div class="profile-new-name-input">
                        <input type="text" id="newNameInput" name="newNameInput" />
                    </div>
                </div>
                <div class="profile-name-unedit-button">
                    <button type="button" id="uneditNameButton" onclick="toggleEditName()">
                        <img src="/public/icons/bookin-x-solid.svg" alt="Unedit Name" />
                    </button>
                </div>
            </div>

            <div class="profile-email-container">
                <div class="profile-email-label">
                    Email
                </div>
                <div class="profile-email-value">
                    <?php echo $user['email'] ?>
                </div>
            </div>

            <div class="profile-edit-submit-button">
                <button type="button" id="editSubmitButton" onclick="submitEditProfile()">Update Profile</button>
            </div>
        </div>
    </form>
</div>

<script src="/public/js/profile.js"></script>
