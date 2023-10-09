<?php

require_once 'app/models/CustomerListModel.php';
$email = isset($_GET['email']) ? $_GET['email'] : '';

$CustomerListModel = new CustomerListModel();

$CustomerListModel->deleteCustomer($email);

$customers = $CustomerListModel->getAllCustomer();

?>