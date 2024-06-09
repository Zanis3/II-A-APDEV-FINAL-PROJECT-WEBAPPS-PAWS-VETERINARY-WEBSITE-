<?php
    require 'template/config.php'; 

    $date = date('G');

    function greetings($date){
        if($date >= 0 && $date < 12){
            echo 'Good Morning!';
        }
        elseif($date >=12 && $date < 18){
            echo 'Good Afternoon!';
        }
        else{
            echo 'Good evening!';
        }
    }

    if(isset($_GET['service'])){
        $selectedService = $_GET['service'];
        $_SESSION['selectedService'] = '';

        switch($selectedService){
            case 'Check Up':
                $_SESSION['selectedService'] = 'check-up';
                break;
            case 'Grooming':
                $_SESSION['selectedService'] = 'grooming';
                break;
            case 'Surgery':
                $_SESSION['selectedService'] = 'surgery';
                break;
            case 'Dental':
                $_SESSION['selectedService'] = 'dentist';
                break;
            case 'Vaccination':
                $_SESSION['selectedService'] = 'vaccination';
                break;
            default:
                break;
        }
        
        header("Location: appointment-templates/appointment-vets.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
</head>
<body>
    <?php include_once 'template/header.php';?>
    <center>
        <h1><?php echo greetings($date);?></h1>
        <p><b>Please select services.</b></p>
    </center>
    <div class="center">
        <div class="container">
            <a href="?service=Check Up" class="container-link"><b>Check Up</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="?service=Grooming" class="container-link"><b>Grooming</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="?service=Dental" class="container-link"><b>Dental</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="?service=Surgery" class="container-link"><b>Surgery</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="?service=Vaccination" class="container-link"><b>Vaccination</b><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <?php include_once 'template/footer.php';?>
</body>
</html>
