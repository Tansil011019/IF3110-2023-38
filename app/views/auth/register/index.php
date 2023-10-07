<div class="register-page-container">
    <div class="register-page-background">
        <form action="/register/registerAjax" method="post" class="register-form">
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
                            'required' => true,
                        ];
                        $inputField = BookinInput($inputProps);

                        echo $inputField;
                        ?>
                        <?php
                        require_once 'app/views/libs/function/BookinInput.php';

                        $inputProps = [
                            'name' => 'register-form-last-name',
                            'placeHolder' => "Last Name",
                            'required' => true,
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
                            'required' => true,
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
                            'required' => true,
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
                            'required' => true,
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
        </form>
    </div>
</div>

<?php

require_once 'app/views/auth/authAlert/index.php'

?>