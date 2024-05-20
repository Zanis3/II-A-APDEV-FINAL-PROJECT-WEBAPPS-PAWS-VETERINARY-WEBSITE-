<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        <div class="drop_down">
            <div class="trigger" onclick="toggleDropdown(this)">
                <div class="text"><b> BASIC INFORMATION </b></div>
                <div class="icon"><i class="fas fa-angle-up"></i></div>
            </div>
            <div class="content">
                <ul>
                    <li>Option 1</li>
                    <li>Option 2</li>
                    <li>Option 3</li>
                </ul>
            </div>
        </div>
        <br>
        <br>
        <div class="drop_down">
            <div class="trigger" onclick="toggleDropdown(this)">
                <div class="text"><b> APPOINTMENT </b></div>
                <div class="icon"><i class="fas fa-angle-up"></i></div>
            </div>
            <div class="content">
                <ul>
                    <li>Option 1</li>
                    <li>Option 2</li>
                    <li>Option 3</li>
                </ul>
            </div>
        </div>
        <br>
        <br>
        <div class="drop_down">
            <div class="trigger" onclick="toggleDropdown(this)">
                <div class="text"><b> SCHEDULE </b></div>
                <div class="icon"><i class="fas fa-angle-up"></i></div>
            </div>
            <div class="content">
                <ul>
                    <li>Option 1</li>
                    <li>Option 2</li>
                    <li>Option 3</li>
                </ul>
            </div>
        </div>
    </center>
    <script src="script/appointment.js"></script>
</body>
</html>
