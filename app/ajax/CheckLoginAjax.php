<?php

require_once 'app/models/LoginModel.php';

$LoginModel = new LoginModel();

$response = ['isLoggedIn' => $LoginModel->isLoggedIn(), 'isAdmin' => $LoginModel->isRoleAdmin()];

header('Content-Type: application/json');

echo json_encode($response);
