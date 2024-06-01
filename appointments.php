<?php
    require 'template/config.php';
    $location = 'outer';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
</head>
<body>
    <?php include_once 'template/header.php';?>
    <br>
    <br>
    <div class="center">
        <div class="container">
            <a href="template/appointment-templates/checkup.php" class="container-link"><b>Check Up</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="template/appointment-templates/checkup.php" class="container-link"><b>Grooming</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="template/appointment-templates/checkup.php" class="container-link"><b>Dental</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="template/appointment-templates/checkup.php" class="container-link"><b>Consultation</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="template/appointment-templates/checkup.php" class="container-link"><b>Vaccination</b><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <br>
    <br>
    <?php include_once 'template/footer.php';?>
</body>
</html>
