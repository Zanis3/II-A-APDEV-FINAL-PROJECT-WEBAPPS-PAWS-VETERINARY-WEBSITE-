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
                        <hr class="line">
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
                        <hr class="line">
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
                <div class="dropdown-item">
                    <div class="table-calendar">
                    <br>
                    <br>
                        <table class="calendar">
                            <tr>
                                <td colspan="4" style="text-align: left; background-color: #064E3B; color: white">
                                    <select id="monthSelect" style="width: 70%; height: 30px;"></select>
                                    <script>
                                        var monthSelect = document.getElementById('monthSelect');
                                        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                                        for (var i = 0; i < months.length; i++) {
                                            var option = document.createElement('option');
                                            option.text = months[i];
                                            option.value = i + 1;
                                            monthSelect.appendChild(option);
                                        }
                                    </script>
                                </td>
                                <td colspan="3" style="text-align: right; background-color: #064E3B; color: white" id="yearCell">
                                    <strong>
                                        <script>
                                            // Function to update the year
                                            function updateYear() {
                                                var yearCell = document.getElementById('yearCell');
                                                var currentYear = new Date().getFullYear();
                                                yearCell.innerText = currentYear;
                                            }
                                            updateYear();

                                            setInterval(updateYear, 10000);
                                        </script>
                                    </strong>
                                </td>
                            <tr>
                                <td style="background-color: #0fa47c; color: white"><b></b></td>
                                <td style="text-align: center; background-color: #0fa47c; color: white"><b>MON</b></td>
                                <td style="text-align: center; background-color: #0fa47c; color: white"><b>TUE</b></td>
                                <td style="text-align: center; background-color: #0fa47c; color: white"><b>WED</b></td>
                                <td style="text-align: center; background-color: #0fa47c; color: white"><b>THU</b></td>
                                <td style="text-align: center; background-color: #0fa47c; color: white"><b>FRI</b></td>
                                <td style="text-align: center; background-color: #0fa47c; color: white"><b>SAT</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>9 AM - 10 AM</b></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>10 AM - 11 AM</b></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>11 AM - 12 PM</b></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; background-color: #0fa47c; color: white" colspan="7"><b>LUNCH BREAK</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>1 PM - 2 PM</b></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>2 PM - 3 PM</b></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>3 PM - 4 PM</b></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>4 PM - 5 PM</b></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                                <td><button class="timeButton button">&nbsp;</button></td>
                            </tr>
                        </table>
                        <script>
                            // Function to handle button click
                            function toggleButtonColor() {
                                var button = this;
                                if (button.style.backgroundColor === 'rgb(240, 240, 240)') {
                                    button.style.backgroundColor = '#65A30D';
                                } else {
                                    button.style.backgroundColor = '#f0f0f0';
                                }
                            }

                            // Add click event listeners to all buttons with class "timeButton"
                            var buttons = document.getElementsByClassName('timeButton');
                            for (var i = 0; i < buttons.length; i++) {
                                buttons[i].addEventListener('click', toggleButtonColor);
                            }
                        </script>
                    </div>
                    <div class="sched-container">
                        <div class="legends">
                            <p><b> LEGENDS </b></p>
                            <hr class="line">
                            <br>
                            <table class="tbl-legends">
                                <tr>
                                    <td><i class="fas fa-circle" style="color: #65A30D"></i></td>
                                    <td><i class="fas fa-circle" style="color: #00fffb"></i></td>
                                    <td><i class="fas fa-circle" style="color: #ff0000"></i></td>
                                </tr>
                                <tr>
                                    <td><p> Your Schedule </p></td>
                                    <td><p> Taken </p></td>
                                    <td><p> Not Available </p></td>
                                </tr>
                            </table>
                        </div>
                        <div class="output">
                            <p><b> SCHEDULE </b></p>
                            <hr class="line">
                            <br>
                            <input type="text" name="txtSchedule" class="sched-output" disabled>
                        </div>
                        <div class="notice">
                            <p><b> REMINDERS </b></p>
                            <p>Every schedules will start on time. Please come 30 mins. before the said appointment.</p>
                            <p><b>- Paw's Veterinary Clinic</b></p>
                        </div>
                    </div>
                </div>
                <div class="button-container">
                    <button onclick="submitForm()">Submit</button>
                    <button onclick="clearForm()">Clear</button>
                </div>
            </div>
        </div>
    </center>
    <script src="script/appointment.js"></script>
</body>
</html>
