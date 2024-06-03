<?php
    $location = 'dashboard';
    if (isset($_POST['back'])) {
        header('Location: schedule.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
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
        <h1>Information</h1>
        <p>Please fill up all fields</p>
        <br>
    </center>
    <center>
        <div class="information">
            <form method="post">
                <table>
                    <tr>
                        <td><label for="txtLName">Last Name: </label></td>
                        <td><input type=text name="txtLName"></td>
                        <td></td>
                        <td><label for="txtFName">First Name: </label></td>
                        <td><input type="text" name="txtFName"></td>
                    </tr>
                    <tr>
                        
                    </tr>
                </table>
                <table>
                    <tr>
                        <td><button class="back" type="submit" name="back"><b>Back</b></button></td>
                        <td><button class="back" type="submit" name="next"><b>Next</b></button></td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
    <br>
    <?php include_once '../template/footer.php';?>
</body>
</html>