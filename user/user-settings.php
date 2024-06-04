<?php
    require '../template/config.php';

    if($isLoggedIn == false){
        header('Location: ../index.php');
    }
?>