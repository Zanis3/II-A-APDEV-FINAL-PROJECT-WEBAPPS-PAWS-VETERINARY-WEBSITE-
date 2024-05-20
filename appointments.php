<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php include_once 'template/header.php';?>
    <br>
    <br>
    <center>
        <h1 id="greeting"></h1>
        <p><b> Please fill up the fields below. </b></p>
        <br>
        <br>
        <br>

        <div class="dropdown-container">
            <div class="dropdown-header" onclick="toggleDropdown('information', this)" data-dropdown-id="information">
                <b style="color: white;">INFORMATION</b>
                <i class="fas fa-angle-right icon" style="color: white"></i>
            </div>
            <div id="informationDropdown" class="dropdown-content">
                <div class="dropdown-item">
                    <div class="form-group">
                        <h3> OWNER'S INFORMATION </h3>
                        <br>
                        <table>
                            <tr>
                                <td>
                                    <label for="txtFname" name="firstName"><b> First Name: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtFName">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtLname" name="lastname"><b> Last Name: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtLName">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtNum" name="number"><b> Number: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtNumber">
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
                        <br>
                        <table>
                            <tr>
                                <td>
                                    <label for="txtPName" name="petname"><b> Name: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtPName">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtPAge" name="age"><b> Age: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtAge">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtGender" name="gender"><b> Gender: </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtGender">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtType" name="type"><b> Type ( Cat/Dog ): </b></label>
                                </td>
                                <td>
                                    <input type="text" id="txtType">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="txtBreed" name="breed"><b> Breed/Species: </b></label>
                                </td>
                                <td>
                                    <input type="text" name="txtBreed">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="button-container">
                    <button onclick="submitForm()">Submit</button>
                    <button onclick="clearForm()">Clear</button>
                </div>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="dropdown-header" onclick="toggleDropdown('appointment', this)" data-dropdown-id="appointment">
                <b style="color: white;">APPOINTMENT</b>
                <i class="fas fa-angle-right icon" style="color: white"></i>
            </div>
            <div id="appointmentDropdown" class="dropdown-content">
                <div class="dropdown-item">
                    <div class="container">
                        <div class="inside_container">
                            <br>
                            <br>
                            <table>
                                <tr>
                                    <td>
                                        <label for="SelType"><b> Appointment Type: </b></label>
                                    </td>
                                    <td>
                                        <select name="AppointmentType">
                                            <option></option>
                                            <option value="service1">Service 1</option>
                                            <option value="service2">Service 2</option>
                                            <option value="service3">Service 3</option>
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
                                        <label for="txtSpecialization"><b> Specialization: </b></label>
                                    </td>
                                    <td>
                                        <input type="text" id="txtSpecialization" name="specialization" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="txtVet"><b> Preffered Vet: </b></label>
                                    </td>
                                    <td>
                                        <select name="PrefferedVet">
                                            <option></option>
                                            <option value="Vet1">Vet 1</option>
                                            <option value="Vet2">Vet 2</option>
                                            <option value="Vet3">Vet 3</option>
                                        </select>
                                    </td>
                                </tr>                                 
                            </table>
                            <br>
                            <br>
                        </div>
                        <div class="inside_container">
                            <table>
                                <tr>
                                    <td>
                                        <label for="txtOthers"> Others: </label>
                                    </td>
                                    <td>
                                        <input type="text" id="txtOthers" name="Others" class="others">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="button-container">
                    <button onclick="submitForm()">Submit</button>
                    <button onclick="clearForm()">Clear</button>
                </div>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="dropdown-header" onclick="toggleDropdown('schedule', this)" data-dropdown-id="schedule">
                <b style="color: white;">SCHEDULE</b>
                <i class="fas fa-angle-right icon" style="color: white"></i>
            </div>
            <div id="scheduleDropdown" class="dropdown-content">
                <div class="dropdown-item">Text on the farther left</div>
            </div>
        </div>
    </center>
    <script src="script/appointment.js"></script>
</body>
</html>
