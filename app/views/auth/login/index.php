<div class="login-page-container">
    <div class="login-title-label">
        Welcome Back
    </div>
    <div class="login-form">
        <div class="login-form-email-address-container">
            <?php
            require_once 'app/views/libs/function/BookinInput.php';

            $inputProps = [
                'name' => 'login-form-email-address',
                'placeHolder' => "Email Address",
                'type' => "email",
            ];

            $inputField = BookinInput($inputProps);

            echo $inputField;
            ?>
        </div>
        <div class="login-form-password-container">
            <?php
            require_once 'app/views/libs/function/BookinInput.php';

            $inputProps = [
                'name' => 'login-form-password',
                'placeHolder' => "password",
                'type' => 'password',
            ];

            $inputField = BookinInput($inputProps);

            echo $inputField;
            ?>
        </div>
    </div>
</div>