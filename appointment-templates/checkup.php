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
    <br>
    <center>
        <form method="post">
            <button type="submit" name="back"><b>Go Back</b></button>
        </form>
    </center>
    <?php include_once '../template/footer.php';?>
</body>
