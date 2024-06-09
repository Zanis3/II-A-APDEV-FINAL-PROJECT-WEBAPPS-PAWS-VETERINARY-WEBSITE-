<?php
    require '../template/config.php';

    $location = 'folder';
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
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    
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
            <form method="post">
                <!-- New two-tone container -->
                <div class="two-tone-container">
                    <div class="upper-part">
                        <div class="left-content">
                            <h2 style="margin-left: 10px; margin-top: 0; margin-bottom: 0;">Appointment ID: </h2>
                            <table style="margin-left: 70px;">
                                <tr style="padding: 0;">
                                    <td><p><b>Pet Name: </b></p></td>
                                    <td><?php echo $_SESSION['txtPName'];?></td>
                                    <td><p><b>Pet Age:</b></p></td>
                                    <td><?php echo $_SESSION['txtPAge'];?></td>
                                    <td><p><b>Gender: </b></p></td>
                                    <td><?php echo ucwords($_SESSION['txtPGender']);?></td>
                                </tr>
                                <tr>
                                    <td><p><b>Pet Type: </b></p></td>
                                    <td><?php echo ucwords($_SESSION['txtPType']);?></td>
                                    <td><p><b>Pet Breed:</b></p></td>
                                    <td><?php echo $_SESSION['txtPBreed'];?></td>
                                    <td><p><b>Schedule: </b></p></td>
                                    <td><p><?php echo $_SESSION['selected_date'] . $_SESSION['selected_time']?></p></td>
                                </tr>
                            </table>
                        </div>
                        <div class="right-content">
                            <div class="icon-container">
                                <i class="fas fa-user"></i> <!-- Font Awesome person icon -->
                            </div>
                        </div>
                    </div>
                    <div class="lower-part">
                        <div class="left-content">
                            <table>
                                <tr>
                                    <td><p><b>First Name: </b></p></td>
                                    <td><?php echo $_SESSION['txtLName'];?></td>
                                    <td><p><b>Last Name: </b></p></td>
                                    <td><?php echo $_SESSION['txtFName'];?></td>
                                    <td><p><b>Contact Number: </b></p></td>
                                    <td><?php echo $_SESSION['txtContact'];?></td>
                                </tr>
                                <tr>
                                    <td><p><b>Email: </b></p></td>
                                    <td><?php echo $_SESSION['txtEmail'];?></td>
                                    <td><p><b>Address:</b></p></td>
                                    <td><?php echo $_SESSION['txtAddress'];?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="right-content">
                            <table style="margin-right: 10px;">
                                <tr>
                                    <td><p><b>Type: </b></p></td>
                                    <td><?php echo ucwords($_SESSION['selectedService']);?></td>
                                    <td><p><b>Assigned: </b></p></td>
                                    <td><?php echo $_SESSION['vetname'];?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"><p><b>Paws Vet Clinic</b></p></td>
                                </tr>
                            </table >
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