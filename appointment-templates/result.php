<?php
    require '../template/config.php';

    $location = 'folder';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST['back'])) {
            header('Location: information.php');
            exit();
        }
        if (isset($_POST['next'])) {
            header('Location: appointment-summary.php');
            exit();
        }
    }

    #KUHAIN NAME NG VET
    $getDoctorName = $connection->prepare('SELECT contactID from tbl_doctorinfo WHERE doctorID = ? LIMIT 1');
    $getDoctorName->bind_param('i', $_SESSION['selectedVetID']);
    $getDoctorName->execute();
    $getDoctorName->bind_result($docContactID);
    $getDoctorName->fetch();
    $getDoctorName->close();

    $getContactInfo = $connection->prepare('SELECT * FROM tbl_contactinfo WHERE contactID = ? LIMIT 1');
    $getContactInfo->bind_param('i', $docContactID);
    $getContactInfo->execute();
    $result = $getContactInfo->get_result();
    $docName = $result->fetch_assoc();
    $getContactInfo->close();
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
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
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
                            <td><input type="text" name="txtAppointment" value="<?php echo htmlspecialchars(ucwords($_SESSION['selectedService'])); ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtAssigned"><b>Vet: </b></label></td>
                            <td><input type="text" name="txtAssigned" value="<?php echo htmlspecialchars('Dr. '.$docName['contactFirstName'] . ' ' . $docName['contactLastName']); ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtDate"><b>Date: </b></label></td>
                            <td><input type="text" name="txtDate" value="<?php echo htmlspecialchars($_SESSION['selected_date']);?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtTime"><b>Time: </b></label></td>
                            <td><input type="text" name="txtTime" value="<?php echo htmlspecialchars($_SESSION['selected_time']);?>" disabled></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td><label for="txtFName"><b>First Name: </b></label></td>
                            <td><input type="text" name="txtFName" value="<?php echo htmlspecialchars($_SESSION['txtFName']);?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtLName"><b>Last Name: </b></label></td>
                            <td><input type="text" name="txtLName" value="<?php echo htmlspecialchars($_SESSION['txtLName']);?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtContact"><b>Contact Number: </b></label></td>
                            <td><input type="text" name="txtContact" value="<?php echo htmlspecialchars($_SESSION['txtContact']);?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtEmail"><b>Email: </b></label></td>
                            <td><input type="text" name="txtEmail" value="<?php echo htmlspecialchars($_SESSION['txtEmail']);?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtAddress"><b>Address: </b></label></td>
                            <td><input type="text" name="txtAddress" value="<?php echo htmlspecialchars($_SESSION['txtAddress']);?>" disabled></td>
                        </tr>
                    </table>
                </div>
                <div class="result-box">
                    <table>
                        <tr>
                            <td><label for="txtPName"><b>Pet Name: </b></label></td>
                            <td><input type="text" name="txtPName" value="<?php echo htmlspecialchars($_SESSION['txtPName']);?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtPAge"><b>Pet Age: </b></label></td>
                            <td><input type="text" name="txtPAge" value="<?php echo htmlspecialchars($_SESSION['txtPAge']);?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtPGender"><b>Pet Gender: </b></label></td>
                            <td><input type="text" name="txtGender" value="<?php echo htmlspecialchars(ucwords(($_SESSION['txtPGender']))); ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtPType"><b>Pet Type: </b></label></td>
                            <td><input type="text" name="txtPType" value="<?php echo htmlspecialchars(ucwords($_SESSION['txtPType'])); ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><label for="txtPBreed"><b>Pet Breed: </b></label></td>
                            <td><input type="text" name="txtPBreed" value="<?php echo htmlspecialchars($_SESSION['txtPBreed']); ?>" disabled></td>
                        </tr>
                    </table>
                    <div class="reminder">
                        <p>Each appointment will start on time. Please come 30 mins. before your appointment.</p>
                        <p><b> - PAWS VET CLINIC </b></p>
                    </div>
                </div>
            </div>
            <table>
                <tr>
                    <td><button type="submit" name="back"><b>Go Back</b></button></td>
                    <td>&nbsp;</td>
                    <td><button type="submit" name="next"><b>Next</b></button></td>
                </tr>
            </table>
        </form>
    </center>
    <br>
    <?php include_once '../template/footer.php';?>
</body>
</html>
