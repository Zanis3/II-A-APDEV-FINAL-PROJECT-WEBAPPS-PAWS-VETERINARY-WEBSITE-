<?php
    require 'template/config.php'; 

    if(isset($_GET['service'])) {
        $selectedService = $_GET['service'];
        $_SESSION['selectedService'] = $selectedService; // Store the selected service in the session

        // Redirect to the appropriate page based on the selected service
        switch($selectedService) {
            case 'Check Up':
                header("Location: appointment-templates/checkup.php");
                break;
            case 'Grooming':
                header("Location: appointment-templates/grooming.php");
                break;
            case 'Surgery':
                header("Location: appointment-templates/surgery.php");
                break;
            case 'Dental':
                header("Location: appointment-templates/dental.php");
                break;
            case 'Vaccination':
                header("Location: appointment-templates/vaccination.php");
                break;
            default:
                // Handle unknown service
                header("Location: error.php");
                break;
        }
        exit(); // Ensure no further code is executed after the redirect
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
</head>
<body>
    <?php include_once 'template/header.php';?>
    <script>
        function greetings() {
            var today = new Date();
            var curHr = today.getHours();
            var greeting = "";

            if (curHr < 12) {
                greeting = "Good Morning!";
            } else if (curHr < 18) {
                greeting = "Good Afternoon!";
            } else {
                greeting = "Good Evening!";
            }

            document.getElementById('greeting').innerHTML = greeting;
        }

        // Call the greetings function after the DOM content is fully loaded
        document.addEventListener('DOMContentLoaded', (event) => {
            greetings();
        });
    </script>
    <center>
        <h1 id="greeting"></h1>
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
