<div class="register-page-container">
    <div class="register-page-background">
        <div class="register-form">
            <div class="register-form-upper">
                <div class="register-title-label">
                    Create a new account.
                </div>
                <div class="register-form-component">
                    <div class="register-form-name-container">
                        <?php
                        require_once 'app/views/libs/function/BookinInput.php';

                        $inputProps = [
                            'name' => 'register-form-first-name',
                            'placeHolder' => "First Name",
                        ];
                        $inputField = BookinInput($inputProps);

                        echo $inputField;
                        ?>
                        <?php
                        require_once 'app/views/libs/function/BookinInput.php';

                        $inputProps = [
                            'name' => 'register-form-last-name',
                            'placeHolder' => "Last Name",
                        ];
                        $inputField = BookinInput($inputProps);

                        echo $inputField;
                        ?>
                    </div>
                    <div class="register-form-email-address-container">
                        <?php
                        require_once 'app/views/libs/function/BookinInput.php';

                        $inputProps = [
                            'name' => 'register-form-email-address',
                            'placeHolder' => "Email Address",
                            'type' => "email",
                        ];
                        $inputField = BookinInput($inputProps);

                        echo $inputField;
                        ?>
                    </div>
                    <div class="register-form-password-container">
                        <?php
                        require_once 'app/views/libs/function/BookinInput.php';

                        $inputProps = [
                            'name' => 'register-form-password',
                            'placeHolder' => "Password",
                            'type' => 'password',
                        ];

                        $inputField = BookinInput($inputProps);

                        echo $inputField;
                        ?>
                    </div>
                    <div class="register-form-confirm-password-container">
                        <?php
                        require_once 'app/views/libs/function/BookinInput.php';

                        $inputProps = [
                            'name' => 'register-form-confirm-password',
                            'placeHolder' => "Confirm Password",
                            'type' => 'password',
                        ];

                        $inputField = BookinInput($inputProps);

                        echo $inputField;
                        ?>
                    </div>
                </div>
            </div>
            <div class="register-form-bottom">
                <button class="register-button">
                    Register
                </button>
            </div>
        </div>
    </div>
</div>