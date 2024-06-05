<?php
    require '../template/config.php';

    if($role != 'doctor'){
        if($role == 'admin'){
            header('Location: Dashboard.php');
        }
        else{
            header('Location: ../index.php');
        }
    }
?>