<?php

require_once 'app/views/libs/function/BookinAlert.php';

if (isset($data['errorMessage']) && isset($data['errorType'])) {
    $alert = BookinAlert($data['errorMessage'], $data['errorType']);
    echo $alert;
}

?>