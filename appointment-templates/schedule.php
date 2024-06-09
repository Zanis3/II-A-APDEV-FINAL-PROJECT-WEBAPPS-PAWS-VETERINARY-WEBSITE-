<?php
    require '../template/config.php';
    $location = 'folder';

    $error_message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['next'])) {
            if (empty($_POST['selected_date']) && empty($_POST['selected_time'])) {
                $error_message = 'Please select schedule';
            } elseif (empty($_POST['selected_date'])) {
                $error_message = 'Please select a date';
            } elseif (empty($_POST['selected_time'])) {
                $error_message = 'Please select a time';
            } else {
                $_SESSION['selected_date'] = $_POST['selected_date'];
                $_SESSION['selected_time'] = $_POST['selected_time'];
                header('Location: information.php');
                exit();
            }
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
    <style>
        .notice-box {
            background-color: #ffdddd;
            color: #d8000c;
            border: 1px solid #d8000c;
            padding: 10px;
            margin: 10px 0;
            display: none;
        }
    </style>
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
                <div class="notice-box" id="notice-box"><?php echo $error_message; ?></div>
                <script src="../script/appointment-calendar.js"></script>
            </center>
            <center>
                <form method="post" onsubmit="return validateForm()">
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
    <?php if (!empty($error_message)): ?>
        <script type="text/javascript">
            alert("<?php echo $error_message; ?>");
        </script>
    <?php endif; ?>
</body>
</html>
