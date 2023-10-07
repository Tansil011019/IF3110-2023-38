<?php

require_once 'app/models/LoginModel.php';
require_once 'app/common/RequestException.php';

$email = "'" . $_POST['login-form-email-address'] . "'";
$password = $_POST['login-form-password'];

$LoginModel = new LoginModel();

$user = $LoginModel->getUser($email);

if (!$user) {
    throw new RequestException('User not found', 404);
}

if (password_verify($password, $user['password'])) {
    $_SESSION['userId'] = $user['user_id'];
    $_SESSION['isAdmin'] = $LoginModel->isAdmin($user);
    header("Location: /"); 
    exit ;
} else {
    throw new RequestException('Unauthorized', 401);
}

