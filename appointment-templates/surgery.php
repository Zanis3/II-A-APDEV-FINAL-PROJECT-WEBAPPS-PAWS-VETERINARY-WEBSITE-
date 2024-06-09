<?php
    require '../template/config.php';

    $location = 'folder';
    if (isset($_POST['back'])) {
        header('Location: ../appointments.php');
        exit();
    }

    if (isset($_GET['vet'])) {
        $selectedVet = $_GET['vet'];
        $_SESSION['selectedVet'] = $selectedVet;
        header("Location: schedule.php");
        exit();
    }
?>
<head>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
    <title>Surgery</title>
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
            <a href="?vet=Dr. Sarah Johnson" class="container-link"><b>Dr. Sarah Johnson</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="?vet=Dr. Michael Patel" class="container-link"><b>Dr. Michael Patel</b><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <br>
    <div class="button-container">
        <form method="post">
            <button type="submit" name="back" class="btnAppointment"><b>Go Back</b></button>
        </form>
    </div>
    <?php include_once '../template/footer.php';?>
</body>