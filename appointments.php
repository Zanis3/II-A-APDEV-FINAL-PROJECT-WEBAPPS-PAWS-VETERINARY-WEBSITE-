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
</head>
<body>
    <?php include_once 'template/header.php';?>
    <br>
    <br>
    <center>
        <h1 id="greeting"></h1>
        <p><b> Please fill up the fields below. </b></p>
        <br>
        <br>
        <br>

        <div class="dropdown-container">
            <div class="dropdown-header" onclick="toggleDropdown('information', this)" data-dropdown-id="information">
                <b>Information</b>
                <i class="fas fa-angle-right icon"></i>
            </div>
            <div id="informationDropdown" class="dropdown-content">
                <div class="dropdown-item">Text on the farther left</div>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="dropdown-header" onclick="toggleDropdown('appointment', this)" data-dropdown-id="appointment">
                <b>Appointment</b>
                <i class="fas fa-angle-right icon"></i>
            </div>
            <div id="appointmentDropdown" class="dropdown-content">
                <div class="dropdown-item">Text on the farther left</div>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="dropdown-header" onclick="toggleDropdown('schedule', this)" data-dropdown-id="schedule">
                <b>Schedule</b>
                <i class="fas fa-angle-right icon"></i>
            </div>
            <div id="scheduleDropdown" class="dropdown-content">
                <div class="dropdown-item">Text on the farther left</div>
            </div>
        </div>
    </center>
    <script src="script/appointment.js"></script>
</body>
</html>
