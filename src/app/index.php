<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="styles/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="public/favicon.svg" type="image/svg+xml">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            require_once 'components/BookinInput.php';

            $props = [
                'name' => 'testing-only',
                'type' => 'password',
                'placeHolder' => 'Password'
            ];

            $inputTest = BookinInput($props);

            echo $inputTest;    
        ?>
    </div>
</body>
</html>