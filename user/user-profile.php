<?php
    require '../template/config.php';
    $location = 'folder';

    if($isLoggedIn == false){
        header('Location: ../index.php');
    }
?>

<head>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php include_once('../template/header.php');?>
    <?php include_once('../template/footer.php');?>
</body>