<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);

    session_start(); // Start the session
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['appointmentSubmit'])) {
        if (empty($_POST['appointmentType'])) {
            echo "<script>alert('Please set appointment type.');</script>";
        } else {
            $_SESSION['appointmentType'] = $_POST['appointmentType'];
            $_SESSION['specialization'] = $_POST['specialization'];
            $_SESSION['prefferedVet'] = $_POST['prefferedVet'];
            $_SESSION['complaints'] = $_POST['complaints'];
        }
    }

    if (isset($_POST['appointmentClear'])) {
        unset($_SESSION['appointmentType']); // Unset specific session variables related to appointment form
        unset($_SESSION['specialization']);
        unset($_SESSION['prefferedVet']);
        unset($_SESSION['complaints']);
    }
?>
<head>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="dropdown-container">
        <div class="dropdown-header" onclick="toggleDropdown('appointment', this)" data-dropdown-id="appointment">
            <b style="color: white;">APPOINTMENT</b>
            <i class="fas fa-angle-right icon" style="color: white"></i>
        </div>
        <div id="appointmentDropdown" class="dropdown-content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="appointmentForm">
                <div class="dropdown-item">
                    <div class="form-group">
                        <br>
                        <br>
                        <table>
                            <tr>
                                <td>
                                    <label for="selAppointmentType"><b> Appointment </b></label>
                                </td>
                                <td>
                                    <select name="appointmentType" id="selAppointmentType" onchange="updateSpecialization()">
                                        <option value="" <?php echo ($_SESSION['appointmentType'] ?? '') == '' ? 'selected' : ''; ?>></option>
                                        <option value="Check Up" <?php echo ($_SESSION['appointmentType'] ?? '') == 'Check Up' ? 'selected' : ''; ?>>Check Up</option>
                                        <option value="Consultation" <?php echo ($_SESSION['appointmentType'] ?? '') == 'Consultation' ? 'selected' : ''; ?>>Consultation</option>
                                        <option value="Dental" <?php echo ($_SESSION['appointmentType'] ?? '') == 'Dental' ? 'selected' : ''; ?>>Dental</option>
                                        <option value="Grooming" <?php echo ($_SESSION['appointmentType'] ?? '') == 'Grooming' ? 'selected' : ''; ?>>Grooming</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="hiddenSpecialization"><b> Specialization: </b></label>
                                </td>
                                <td>
                                    <input style="width: 97%" type="text" id="hiddenSpecialization" name="specialization" value="<?php echo isset($_SESSION['specialization']) ? htmlspecialchars($_SESSION['specialization']) : ''; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="selVet"><b> Preffered Vet: </b></label>
                                </td>
                                <td>
                                    <select name="prefferedVet" id="selVet">
                                        <option></option>
                                            <?php
                                                // Array of preferred vets
                                                $preferredVets = array("Dr. Emily Patel", "Dr. Michael Chang", "Dr. Sarah Jones", "Dr. David Smith", "Dr. Jennifer Lee", "Dr. Christopher Taylor", "Ms. Rebecca Garcia", "Mr. Daniel Nguyen");

                                                // Loop through each preferred vet and generate <option> elements
                                                foreach ($preferredVets as $vet) {
                                                    // Check if the current vet matches the one stored in session
                                                    $selected = ($_SESSION['prefferedVet'] ?? '') == $vet ? 'selected' : '';
                                                    echo "<option value='$vet' $selected>$vet</option>";
                                                }
                                            ?>
                                    </select>
                                </td>
                            </tr>                                 
                        </table>
                        <script>
                            function updateSpecialization() {
                                var appointmentType = document.getElementById("selAppointmentType").value;
                                var specializationField = document.getElementById("hiddenSpecialization");
                                var specialization = "";
                                var vetDropdown = document.getElementById("selVet");

                                // Determine the specialization based on the selected appointment type
                                switch (appointmentType) {
                                    case "Check Up":
                                        specialization = "General Medicine";
                                        populateVetDropdown(["Dr. Emily Patel", "Dr. Michael Chang"], vetDropdown);
                                        break;
                                    case "Consultation":
                                        specialization = "Consulting Veterinarian";
                                        populateVetDropdown(["Dr. Sarah Jones", "Dr. David Smith"], vetDropdown); 
                                        break;
                                    case "Dental":
                                        specialization = "Veterinary Dentistry";
                                        populateVetDropdown(["Dr. Jennifer Lee", "Dr. Christopher Taylor"], vetDropdown); 
                                        break;
                                    case "Grooming":
                                        specialization = "Pet Grooming";
                                        populateVetDropdown(["Ms. Rebecca Garcia", "Mr. Daniel Nguyen"], vetDropdown); 
                                        break;
                                    default:
                                        specialization = "";
                                        populateVetDropdown([""], vetDropdown); 
                                        break;
                                }

                                // Update the specialization field
                                document.getElementById("hiddenSpecialization").value = specialization;
                            }
                            function populateVetDropdown(vets, dropdown) {
                                // Clear previous options
                                dropdown.innerHTML = "";

                                // Add new options based on the provided list of vets
                                vets.forEach(function(vet) {
                                    var option = document.createElement("option");
                                    option.text = vet;
                                    option.value = vet;
                                    dropdown.add(option);
                                });
                            }
                        </script>
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <br>
                        <table>
                            <tr>
                                <td>
                                    <label for="txtComplaints"> Complaints:  </label>
                                </td>
                                <td>
                                    <input type="text" id="txtComplaints" name="complaints" class="others" value="<?php echo isset($_SESSION['complaints']) ? htmlspecialchars($_SESSION['complaints']) : ''; ?>">
                                </td>
                            </tr>
                        </table>
                       
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" name="appointmentSubmit">Submit</button>
                    <input type="hidden" name="clear" value="true">
                    <button type="submit" name="appointmentClear">Clear</button>
                </div>
            </form>
        </div>
    </div>
</body>
