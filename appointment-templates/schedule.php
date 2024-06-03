<?php
    $location = 'dashboard';
    if (isset($_POST['back'])) {
        header('Location: checkup.php');
        exit();
    }
    if(isset($_POST['next'])) {
        header('Location: information.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="stylesheet" href="../css/calendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
</head>
<body>
    <div class="content">
        <?php include_once '../template/header.php';?>
        <main class="main-content">
            <center>
                <div class="year-display" id="year-display"></div>
                <div class="calendar-container">
                    <button id="prev" onclick="moveLeft()">&#9664;</button>
                    <div class="calendar" id="calendar"></div>
                    <button id="next" onclick="moveRight()">&#9654;</button>
                </div>
                <div id="time-slots" class="time-slots-container"></div>
                <div id="selected-date"></div>
                <script src="../script/calendar.js"></script>
            </center>
            <center>
                <form method="post">
                    <table>
                        <tr>
                            <td><button class="back" type="submit" name="back"><b>Back</b></button></td>
                            <td><button class="back" type="submit" name="next"><b>Next</b></button></td>
                        </tr>
                    </table>
                </form>
            </center>
        </main>
        <?php include_once '../template/footer.php';?>
    </div>
</body>
</html>