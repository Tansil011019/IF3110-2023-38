<?php

require_once 'app/models/LoginModel.php';

$LoginModel = new LoginModel();

$response = ['isLoggedIn' => $LoginModel->isLoggedIn()];

header('Content-Type: application/json');

echo json_encode($response);
