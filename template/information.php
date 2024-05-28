<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);
    
    session_start(); // Start the session
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['informationSubmit'])) {
        if (empty($_POST['firstName']) && empty($_POST['lastName']) && empty($_POST['number']) && empty($_POST['pName']) && empty($_POST['pAge']) && empty($_POST['pGender']) && empty($_POST['pType']) && empty($_POST['pBreed'])) {
            echo "<script>alert('Please fill in all required fields.');</script>";
        } elseif (empty($_POST['firstName']) && empty($_POST['lastName'])) {
            echo "<script>alert('Please state your name.');</script>";
        } elseif (empty($_POST['number'])) {
            echo "<script>alert('Please input your contact number.');</script>";
        } elseif (empty($_POST['pName'])) {
            echo "<script>alert('Please input your pet name.');</script>";
        } elseif (empty($_POST['pAge'])) {
            echo "<script>alert('Please state the age of your pet.');</script>";
        } elseif (empty($_POST['pGender'])) {
            echo "<script>alert('Please state the gender of your pet.');</script>";
        } elseif (empty($_POST['pType'])) {
            echo "<script>alert('Please state the type of your pet.');</script>";
        } elseif (empty($_POST['pBreed'])) {
            echo "<script>alert('Please state the breed of your pet.');</script>";
        } else {
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
            $_SESSION['number'] = $_POST['number'];
            $_SESSION['pName'] = $_POST['pName'];
            $_SESSION['pAge'] = $_POST['pAge'];
            $_SESSION['pGender'] = $_POST['pGender'];
            $_SESSION['pType'] = $_POST['pType'];
            $_SESSION['pBreed'] = $_POST['pBreed'];
        }
    }
    if (isset($_POST['clear'])) {
        $_SESSION['firstName'] = "";
        $_SESSION['lastName'] = "";
        $_SESSION['number'] = "";
        $_SESSION['pName'] = "";
        $_SESSION['pAge'] = "";
        $_SESSION['pGender'] = "";
        $_SESSION['pType'] = "";
        $_SESSION['pBreed'] = "";
    }
?>
<head>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<body>
    <form id="informationForm" method="post" onsubmit="return submitForm();">
        <div class="dropdown-container">
            <div class="dropdown-header" onclick="toggleDropdown('information', this)" data-dropdown-id="information">
                <b style="color: white;">INFORMATION</b>
                <i class="fas fa-angle-right icon" style="color: white"></i>
            </div>
            <div id="informationDropdown" class="dropdown-content">
                <div class="dropdown-item">
                    <div class="form-group">
                        <h3> OWNER'S INFORMATION </h3>
                        <hr class="line">
                        <br>
                        <table>
                            <tr>
                                <td>
                                    <label for="txtFname"><b> First Name: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtFName" name="firstName" value="<?php echo isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtLname"><b> Last Name: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtLName" name="lastName" value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtNum"><b> Number: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtNumber" name="number" value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <h3> PET INFORMATION </h3>
                        <hr class="line">
                        <br>
                        <table>
                            <tr>
                                <td>
                                    <label for="txtPName"><b> Name: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtPName" name="pName" value="<?php echo isset($_POST['pName']) ? htmlspecialchars($_POST['pName']) : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtPAge"><b> Age: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtAge" name="pAge" value="<?php echo isset($_POST['pAge']) ? htmlspecialchars($_POST['pAge']) : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtGender"><b> Gender: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtGender" name="pGender" value="<?php echo isset($_POST['pGender']) ? htmlspecialchars($_POST['pGender']) : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtType"><b> Type ( Cat/Dog ): </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtType" name="pType" value="<?php echo isset($_POST['pType']) ? htmlspecialchars($_POST['pType']) : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtBreed"><b> Breed/Species: </b></label>
                                </td>
                                <td>
                                    <input type="text" name="pBreed" value="<?php echo isset($_POST['pBreed']) ? htmlspecialchars($_POST['pBreed']) : ''; ?>">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" name="informationSubmit" >Submit</button>
                    <button type="reset" name="informationClear">Clear</button>
                </div>
            </div>
        </div>
    </form>
</body>