<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);

    $conn = mysqli_connect('localhost', 'root', '', 'paws_vet_clinic_db');

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    if(isset($_POST['submit'])) {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $number = $_POST['number'];

        // Insert owner information into ownertbl
        $ownerSql = "INSERT INTO ownertbl (firstName, lastName, number) VALUES ('$firstName', '$lastName', '$number')";

        if ($conn->query($ownerSql) === TRUE) {
            // Retrieve the ownerID of the inserted owner
            $ownerID = mysqli_insert_id($conn);

            $pName = $_POST['pName'];
            $pAge = $_POST['pAge'];
            $pGender = $_POST['pGender'];
            $pType = $_POST['pType'];
            $pBreed = $_POST['pBreed'];

            // Insert pet information into pettbl
            $petSql = "INSERT INTO pettbl (pName, pAge, pGender, pType, pBreed) VALUES ('$pName', '$pAge', '$pGender', '$pType', '$pBreed')";

            if ($conn->query($petSql) === TRUE) {
                // Retrieve the petID of the inserted pet
                $petID = mysqli_insert_id($conn);

                // Update the ownertbl to associate the owner with the pet
                $updateOwnerSql = "UPDATE ownertbl SET petID = '$petID' WHERE ownerID = '$ownerID'";
                if ($conn->query($updateOwnerSql) === TRUE) {
                } else {
                    echo "Error updating ownertbl: " . $conn->error;
                }
            } else {
                echo "Error inserting into pettbl: " . $petSql . "<br>" . $conn->error;
            }
        } else {
            echo "Error inserting into ownertbl: " . $ownerSql . "<br>" . $conn->error;
        }
    }
    if(isset($_POST['clear'])) {
        // Unset $_POST variables to clear the form data
        unset($_POST);
    }
    
    $conn->close();
?>

<head>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form id="informationForm" method="post" onsubmit="submitForm();">
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
                                    <input type="text" id="txtFName" name="firstName" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : ''; ?>">
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
                                    <input type="text" id="txtLName" name="lastName" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : ''; ?>">
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
                                    <input type="text" id="txtNumber" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''; ?>">
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
                                    <input type="text" id="txtPName" name="pName" value="<?php echo isset($_POST['pName']) ? $_POST['pName'] : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtPAge"><b> Age: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtAge" name="pAge" value="<?php echo isset($_POST['pAge']) ? $_POST['pAge'] : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtGender"><b> Gender: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtGender" name="pGender" value="<?php echo isset($_POST['pGender']) ? $_POST['pGender'] : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtType"><b> Type ( Cat/Dog ): </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtType" name="pType" value="<?php echo isset($_POST['pType']) ? $_POST['pType'] : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtBreed"><b> Breed/Species: </b></label>
                                </td>
                                <td>
                                    <input type="text" name="pBreed" value="<?php echo isset($_POST['pBreed']) ? $_POST['pBreed'] : ''; ?>">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" name="submit" >Submit</button>
                    <button type="reset">Clear</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function submitForm() {
            $.ajax({
                type: 'POST',
                url: 'information.php', // Submit to the same page
                data: $('#informationForm').serialize(),
                success: function(response) {
                    // If the form submission is successful, open the next dropdown
                    $('#appointmentDropdown').show();
                }
            });
        }
    </script>
</body>