<?php
    session_start();
    ini_set('display_errors', 0);

    $showRegisterUI = isset($_GET['showRegisterUI']) && $_GET['showRegisterUI'] === 'true';
?>
<head>
    <title>Paws Veterinary</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
</head>
<body>
    <?php include_once 'template/header.php';?>
    <?php 
        // Include either login-ui.php or register-ui.php based on condition
        if ($showRegisterUI) {
            include_once 'template/register-ui.php';
        } else {
            include_once 'template/login-ui.php';
        }
    ?>
    <?php include_once 'template/footer.php';?>
</body>