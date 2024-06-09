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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
    <title>Check Up</title>
</head>
<body>
    <?php include_once '../template/header.php';?>
    <br>
    <center>
        <h1>Veterinarians</h1>
        <p><b> Please choose your preferred vet:</b></p>
        <br>
    </center>
    <div class="center">
        <div class="container">
            <a href="?vet=Dr. John Doe" class="container-link"><b>Dr. John Doe</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="?vet=Dr. Jane Smith" class="container-link"><b>Dr. Jane Smith</b><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="button-container">
        <form method="post">
            <button type="submit" name="back" class="btnAppointment"><b>Go Back</b></button>
        </form>
    </div>
    <?php include_once '../template/footer.php';?>
</body>
