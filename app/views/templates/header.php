<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?> </title>
    <link rel="stylesheet" type='text/css' href="/public/css/global.css">
    <link rel="stylesheet" type='text/css' href=<?= $data['style']?>>
    <link rel="shortcut icon" href="/public/images/bookin-logo.svg" type="image/svg+xml">
</head>
<body>
    <header>    
        <?php 
           require_once 'app/views/layouts/navbar.php';
        ?>
    </header>