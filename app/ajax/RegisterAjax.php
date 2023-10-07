<?php 

require_once 'app/common/RequestException.php';
require_once 'app/models/RegisterModel.php';

$firstName = $_POST['register-form-first-name'];
$lastName = $_POST['register-form-last-name'];
$fullName = "'" . $firstName . ' ' . $lastName . "'";
$email = "'" . $_POST['register-form-email-address'] . "'";
$password = $_POST['register-form-password'];
$confirmPassword = $_POST['register-form-confirm-password'];

if(strcmp($password, $confirmPassword)) {
    throw new RequestException('Password and confirm password not match', 400);
}

$hashedPassword = "'" . password_hash($password, PASSWORD_DEFAULT) . "'";

$RegisterModel = new RegisterModel();

try{
    $RegisterModel->insertUser($fullName, $email, $hashedPassword);
    header('Location: /');
    exit;
} catch (PDOException $error) {
    throw new RequestException($error->getMessage(), 400);
}
