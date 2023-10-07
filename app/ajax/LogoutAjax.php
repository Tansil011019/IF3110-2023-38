<?php

session_destroy();

$response = ['success' => true];

header('Content-Type: application/json');
echo json_encode($response);