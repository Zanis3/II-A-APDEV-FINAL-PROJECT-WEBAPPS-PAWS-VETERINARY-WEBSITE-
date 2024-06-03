<?php
    $location = 'dashboard';
    if (isset($_POST['back'])) {
        header('Location: information.php');
        exit();
    }
    if (isset($_POST['next'])) {
        header('Location: summary.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
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
        <h1>Result</h1>
        <p><b>Please check all details before confirming.</b></p>
    </center>
    <br>
    <center>
        <form method="post">
            <div class="result">
                <div class="result-box">
                    <table>
                        <tr>
                            <td><label for="txtAppointment"><b>Appointment: </b></label></td>
                            <td><input type="text" name="txtAppointment" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtAssigned"><b>Vet: </b></label></td>
                            <td><input type="text" name="txtAssigned" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtDate"><b>Date: </b></label></td>
                            <td><input type="text" name="txtDate" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtTime"><b>Time: </b></label></td>
                            <td><input type="text" name="txtTime" disabled></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td><label for="txtFName"><b>First Name: </b></label></td>
                            <td><input type="text" name="txtFName" disabled></td>
                        </tr>
                        <tr>
                            <td><label fpr="txtLName"><b>Last Name: </b></label></td>
                            <td><input type="text" name="txtLName" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtContact"><b>Contact Number: </b></label></td>
                            <td><input type="text" name="txtContact" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtEmail"><b>Email: </b></label></td>
                            <td><input type="text" name="txtEmail" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtAddress"><b>Address: </b></label></td>
                            <td><input type="text" name="txtAddress" disabled></td>
                        </tr>
                    </table>
                </div>
                <div class="result-box">
                    <table>
                        <tr>
                            <td><label for="txtPName"><b>Pet Name: </b></label></td>
                            <td><input type="text" name="txtPName" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtPAge"><b>Pet Age: </b></label></td>
                            <td><input type="text" name="txtPAge" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtPGender"><b>Pet Gender: </b></label></td>
                            <td><input type="text" name="txtGender" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtPType"><b>Pet Type: </b></label></td>
                            <td><input type="text" name="txtPType" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtPBreed"><b>Pet Breed: </b></label></td>
                            <td><input type="text" name="txtPBreed" disabled></td>
                        </tr>
                    </table>
                    <div class="reminder">
                        <p>Each appointment will start on time. Please come 30 mins. before your appointment.</p>
                        <p><b> - PAWS VET CLINIC </b></p>
                    </div>
                </div>
            </div>
            <button type="submit" name="back"><b>Go Back</b></button>
            <button type="submit" name="next"><b>Next</b></button>
        </form>
    </center>
    <br>
    <?php include_once '../template/footer.php';?>
</body>
</html>