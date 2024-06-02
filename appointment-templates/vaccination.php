<?php
    $location = 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
    <title>Vaccination</title>
</head>
<body>
    <?php include_once '../template/header.php';?>
    <br>
    <center>
        <h1>Veterenarians</h1>
        <p><b> Please choose your preffered vet:</b></p>
        <br>
    </center>
    <div class="center">
        <div class="container">
            <a href="#" class="container-link"><b>Dr. John Doe</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="#" class="container-link"><b>Dr. Jane Smith</b><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <center>
        <button type="buttom" name="back"><b>Go Back</b></a></button>
    </center>
    <?php include_once '../template/footer.php';?>
</body>
</html>