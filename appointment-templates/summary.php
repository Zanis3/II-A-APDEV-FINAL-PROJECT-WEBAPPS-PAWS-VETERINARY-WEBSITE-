<?php
    $location = 'dashboard';
    if (isset($_POST['back'])) {
        header('Location: ../index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="stylesheet" href="../css/calendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
    
</head>
<body>
    <?php include_once '../template/header.php';?>
    <br>
    <center>
        <h1>Summary</h1>
        <p><b>You have successfuly placed an appointment!</b></p>
        <br>
    </center>
    <center>
        <div class="information">
            <br>
            <form method="post">
                <!-- New two-tone container -->
                <div class="two-tone-container">
                    <div class="upper-part">
                        <div class="left-content">
                            <h2 style="margin-left: 10px;">Appointment</h2>
                            <p style="margin-left: 70px;"><b>Owner: </b></p>
                            <p style="margin-left: 70px;"><b>Pet Name:</b></p>
                            <p style="margin-left: 70px;"><b>Schedule: </b></p>
                        </div>
                        <div class="right-content">
                            <div class="icon-container">
                                <i class="fas fa-user"></i> <!-- Font Awesome person icon -->
                            </div> <!-- Font Awesome person icon -->
                        </div>
                    </div>
                    <div class="lower-part">
                        <div class="left-content">
                            <p style="margin-left: 10px;"><b>Service: </b></p>
                        </div>
                        <div class="right-content">
                            <p style="margin-right: 10px;"><b>Assigned: </b></p>
                            <p style="margin-right: 10px;"><b>Paws Vet Clinic</b></p>
                        </div>
                    </div>
                </div>
                <button type="submit" name="back"><b>Close</b></button>
            </form>
        </div>
    </center>
    <br>
    <?php include_once '../template/footer.php';?>
</body>
</html>