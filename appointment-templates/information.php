<?php
    require '../template/config.php';
    
    $location = 'folder';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['txtLName'] = $_POST['txtLName'] ?? '';
        $_SESSION['txtFName'] = $_POST['txtFName'] ?? '';
        $_SESSION['txtContact'] = $_POST['txtContact'] ?? '';
        $_SESSION['txtEmail'] = $_POST['txtEmail'] ?? '';
        $_SESSION['txtAddress'] = $_POST['txtAddress'] ?? '';
        $_SESSION['txtPName'] = $_POST['txtPName'] ?? '';
        $_SESSION['txtPAge'] = $_POST['txtPAge'] ?? '';
        $_SESSION['txtPGender'] = $_POST['txtPGender'] ?? '';
        $_SESSION['txtPType'] = $_POST['txtPType'] ?? '';
        $_SESSION['txtPBreed'] = $_POST['txtPBreed'] ?? '';

        if (isset($_POST['back'])) {
            header('Location: schedule.php');
            exit();
        }
        if (isset($_POST['next'])) {
            header('Location: result.php');
            exit();
        }
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
        <p><b>Please fill up all fields</b></p>
        <br>
    </center>
    <center>
        <form method="post">
            <div class="info-container">
                <div class="box">
                    <h3>Owner Information</h3>
                    <hr class="line">
                    <br>
                    <table>
                        <tr>
                            <td><label for="txtLName"> Last Name: </label></td>
                            <td><input type="text" name="txtLName" value="<?php echo $_SESSION['txtLName'] ?? ''; ?>"></td>
                            <td><label for="txtFName"> First Name: </td>
                            <td><input type="text" name="txtFName" value="<?php echo $_SESSION['txtFName'] ?? ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtContact">Contact Number: </label></td>
                            <td colspan="3"><input type="text" name="txtContact" size="59" value="<?php echo $_SESSION['txtContact'] ?? ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtEmail">Email: </label></td>
                            <td colspan="3"><input type="text" name="txtEmail" size="59" value="<?php echo $_SESSION['txtEmail'] ?? ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtAddress">Address: </label></td>
                            <td colspan="3"><input type="text" name="txtAddress" size="59" value="<?php echo $_SESSION['txtAddress'] ?? ''; ?>"></td>
                        </tr>
                    </table>
                </div>
                <div class="box">
                    <h3>Pet Information</h3>
                    <hr class="line">
                    <br>
                    <table>
                        <tr>
                            <td><label for="txtPName">Pet Name:</label></td>
                            <td><input type="text" name="txtPName" value="<?php echo $_SESSION['txtPName'] ?? ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtPAge">Age: </label></td>
                            <td><input type="text" name="txtPAge" value="<?php echo $_SESSION['txtPAge'] ?? ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtPGender">Gender: </label></td>
                            <td><input type="text" name="txtPGender" value="<?php echo $_SESSION['txtPGender'] ?? ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtPType">Type (Cat/Dog): </label></td>
                            <td><input type="text" name="txtPType" value="<?php echo $_SESSION['txtPType'] ?? ''; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtPBreed">Breed: </label></td>
                            <td><input type="text" name="txtPBreed" value="<?php echo $_SESSION['txtPBreed'] ?? ''; ?>"></td>
                        </tr>
                    </table>
                    <br>
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
