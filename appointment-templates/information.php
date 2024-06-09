<?php
    require '../template/config.php';
    
    $location = 'folder';
    $errors = '';

    if($isLoggedIn){
        $getLoginID = $connection->prepare('SELECT loginID, userEmail FROM tbl_loginInfo WHERE username = ?');
        $getLoginID->bind_param('s', $_SESSION['username']);
        $getLoginID->execute();
        $getLoginID->bind_result($loginID, $email);
        $getLoginID->fetch();
        $getLoginID->close();
        
        $getUserInfo = $connection->prepare('SELECT * FROM tbl_contactinfo WHERE loginID = ? LIMIT 1');
        $getUserInfo->bind_param('i', $loginID);
        $getUserInfo->execute();
        $stmt = $getUserInfo->get_result();
        $user = $stmt->fetch_assoc();
        $getUserInfo->close();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION['txtLName'] = $_POST['txtLName'];
        $_SESSION['txtFName'] = $_POST['txtFName'];
        $_SESSION['txtContact'] = $_POST['txtContact'];
        $_SESSION['txtEmail'] = $_POST['txtEmail'];
        $_SESSION['txtAddress'] = $_POST['txtAddress'];
        $_SESSION['txtPName'] = $_POST['txtPName'];
        $_SESSION['txtPAge'] = $_POST['txtPAge'];
        $_SESSION['txtPGender'] = $_POST['txtPGender'];
        $_SESSION['txtPType'] = $_POST['txtPType'];
        $_SESSION['txtPBreed'] = $_POST['txtPBreed'];

        if (isset($_POST['back'])) {
            header('Location: schedule.php');
            exit();
        }

        #VALIDATION
        if(empty($_SESSION['txtLName']) || empty($_SESSION['txtFName']) || empty($_SESSION['txtContact']) || empty($_SESSION['txtEmail']) || empty($_SESSION['txtAddress']) || empty($_SESSION['txtPName']) || empty($_SESSION['txtPAge']) || empty($_SESSION['txtPGender']) || empty($_SESSION['txtPType']) || empty($_SESSION['txtPBreed'])){
            $errors = "Some fields are empty. Please try again.";
        }

        if(isset($_POST['next']) && empty($errors)){
            header('Location: result.php');
            exit();
        }
    }
?>
<head>
    <title>Information</title>
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
        <h1>Information</h1>
        <p><b>Please fill up all fields</b></p>
        <br>
    </center>
    <center>
        <form method="post">
            <div class="info-container">
                <div class="box" style="width: 50%;">
                    <h3>Owner Information</h3>
                    <hr class="line">
                    <br>
                    <table>
                        <tr>
                            <td><label for="txtLName"> Last Name: </label></td>
                            <td><input type="text" name="txtLName" size="15" value="<?php if($isLoggedIn){echo htmlspecialchars($user['contactLastName']);}else{echo htmlspecialchars($_POST['txtLName']);} ?>"></td>
                            <td><label for="txtFName"> First Name: </td>
                            <td><input type="text" name="txtFName" size="15" value="<?php if($isLoggedIn){echo htmlspecialchars($user['contactFirstName']);}else{echo htmlspecialchars($_POST['txtFName']);} ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtContact">Contact Number: </label></td>
                            <td colspan="3"><input type="text" name="txtContact" size="49" value="<?php if($isLoggedIn){echo htmlspecialchars($user['contactNumber']);}else{echo htmlspecialchars($_POST['txtContact']);} ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtEmail">Email: </label></td>
                            <td colspan="3"><input type="text" name="txtEmail" size="49" value="<?php if($isLoggedIn){echo htmlspecialchars($email);}else{echo htmlspecialchars($_POST['txtEmail']);} ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtAddress">Address: </label></td>
                            <td colspan="3"><input type="text" name="txtAddress" size="49" value="<?php if($isLoggedIn){echo htmlspecialchars($user['contactAddress']);}else{echo htmlspecialchars($_POST['txtAddress']);} ?>"></td>
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
                            <td><input type="text" name="txtPName" value="<?php echo htmlspecialchars($_POST['txtPName']); ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtPAge">Age: </label></td>
                            <td><input type="text" name="txtPAge" value="<?php echo htmlspecialchars($_POST['txtPAge']); ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="txtPGender">Gender: </label></td>
                            <td>
                                <select name="txtPGender" id="txtPGender" style="width:100%;">
                                    <option disabled selected value="">Select gender</option>
                                    <option value="male" <?php if($_POST['txtPGender'] == 'male'){echo 'selected';}?>>Male</option>
                                    <option value="female" <?php if($_POST['txtPGender'] == 'female'){echo 'selected';}?>>Female</option>
                                </select>    
                            </td>
                        </tr>
                        <tr>
                            <td><label for="txtPType">Type: </label></td>
                            <td>
                                <select name="txtPType" id="txtPType" style="width:100%;">
                                <option disabled selected value="">Select pet type</option>
                                    <option value="cat" <?php if($_POST['txtPType'] == 'cat'){echo 'selected';}?>>Cat</option>
                                    <option value="dog" <?php if($_POST['txtPType'] == 'dog'){echo 'selected';}?>>Dog</option>
                                </select>  
                            </td>
                        </tr>
                        <tr>
                            <td><label for="txtPBreed">Breed: </label></td>
                            <td><input type="text" name="txtPBreed" value="<?php echo htmlspecialchars($_POST['txtPBreed']); ?>"></td>
                        </tr>
                    </table>
                    <br>
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
        <?php
            // Display error messages
            if (!empty($errors)) {
                echo '<script>';
                echo 'alert("PAWS VET CLINIC\n\n' . $errors . '");';
                echo '</script>';
            }
        ?>
    </center>
    <br>
    <?php include_once '../template/footer.php';?>
</body>