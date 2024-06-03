<?php
    $location = 'dashboard';
    if (isset($_POST['back'])) {
        header('Location: ../appointments.php');
        exit();
    }
?>
<head>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
    <title>Check Up</title>
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
            <a href="schedule.php" class="container-link"><b>Dr. John Doe</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="schedule.php" class="container-link"><b>Dr. Jane Smith</b><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <br>
    <center>
        <form method="post">
            <button type="submit" name="back"><b>Go Back</b></button>
        </form>
    </center>
    <?php include_once '../template/footer.php';?>
</body>