<?php
    require '../template/config.php';
    $location = 'folder';

    if($isLoggedIn == false){
        header('Location: ../index.php');
    }
?>

<head>
    <link rel="stylesheet" href="../css/style_general.css">
</head>

<body>
    <?php include_once('../template/header.php');?>
</body>