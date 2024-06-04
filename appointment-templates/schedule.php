<?php
    require '../template/config.php';
    $location = 'folder';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['selected_date']) && isset($_POST['selected_time'])) {
            $_SESSION['selected_date'] = $_POST['selected_date'];
            $_SESSION['selected_time'] = $_POST['selected_time'];
        }
        if (isset($_POST['next'])) {
            header('Location: information.php');
            exit();
        }
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
                    <input type="hidden" name="selected_date" id="selected_date" value="">
                    <input type="hidden" name="selected_time" id="selected_time" value="">
                    <table>
                        <tr>
                            <td><button class="back" type="submit" name="next"><b>Next</b></button></td>
                        </tr>
                    </table>
                </form>
            </center>
        </main>
        <?php include_once '../template/footer.php';?>
    </div>

    <script>
        // JavaScript to populate hidden input fields with selected date and time
        function setHiddenFields(date, time) {
            document.getElementById('selected_date').value = date;
            document.getElementById('selected_time').value = time;
        }
    </script>
</body>
</html>
