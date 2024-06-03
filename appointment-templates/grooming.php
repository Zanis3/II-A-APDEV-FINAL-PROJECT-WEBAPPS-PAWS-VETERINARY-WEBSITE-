<?php
    session_start();

    $location = 'dashboard';
    if (isset($_POST['back'])) {
        header('Location: ../appointments.php');
        exit();
    }

    if (isset($_GET['vet'])) {
        $selectedVet = $_GET['vet'];
        $_SESSION['selectedVet'] = $selectedVet; // Store the selected vet in the session
        header("Location: schedule.php"); // Redirect to the schedule page
        exit(); // Ensure no further code is executed after the redirect
    }
?>
<head>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
    <title>Grooming</title>
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
            <a href="?vet=Ms. Rachel Smith" class="container-link"><b>Ms. Rachel Smith</b><i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="container">
            <a href="?vet=Mr. James Lee" class="container-link"><b>Mr. James Lee</b><i class="fas fa-arrow-right"></i></a>
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