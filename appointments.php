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
                                        <label for="SelType"><b> Appointment </b></label>
                                        
                                    </td>
                                    <td>
                                        <select name="AppointmentType" id="AppointmentType" onchange="updateSpecialization()">
                                            <option></option>
                                            <option value="Check Up">Check Up</option>
                                            <option value="Consultation">Consultation</option>
                                            <option value="Dental">Dental</option>
                                            <option value="Grooming">Grooming</option>
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
                                        <select name="PrefferedVet" id="PreferredVet">
                                            <option></option>
                                        </select>
                                    </td>
                                </tr>                                 
                            </table>
                            <script>
                                function updateSpecialization() {
                                    var appointmentType = document.getElementById("AppointmentType").value;
                                    var specializationField = document.getElementById("txtSpecialization");
                                    var specialization = "";
                                    var vetDropdown = document.getElementById("PreferredVet");

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
                                            populateVetDropdown(["Vet3", "Vet4"], vetDropdown); 
                                            break;
                                    }

                                    // Update the specialization field
                                    specializationField.value = specialization;
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
                        <div class="inside_container">
                            <table>
                                <tr>
                                    <td>
                                        <label for="txtOthers"> Complaints:  </label>
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
                                    <select id="monthSelect" style="width: 70%; height: 30px;" onchange="disablePastMonths()">
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
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>10 AM - 11 AM</b></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>11 AM - 12 PM</b></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; background-color: #0fa47c; color: white" colspan="7"><b>LUNCH BREAK</b></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>1 PM - 2 PM</b></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>2 PM - 3 PM</b></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>3 PM - 4 PM</b></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; background-color: #0fa47c; color: white"><b>4 PM - 5 PM</b></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                                <td><button class="timeButton button" onclick="handleButtonClick(this)">&nbsp;</button></td>
                            </tr>
                        </table>
                        <script>
                            function toggleButtonColor(button) {
                                // Toggle the 'selected' class
                                button.classList.toggle('selected');

                                // Toggle the background color of the button based on the 'selected' class
                                if (button.classList.contains('selected')) {
                                    button.style.backgroundColor = '#65A30D'; // Green color
                                    // Get the selected day
                                    var selectedDay = getSelectedDay(button);
                                    console.log("Selected Day:", selectedDay);
                                    updateScheduleOutput(selectedDay);
                                } else {
                                    button.style.backgroundColor = '#f0f0f0'; // Gray color
                                    // Clear the output field
                                    updateScheduleOutput(""); // Pass an empty string to clear the output
                                }

                                // Remove 'selected' class from all other buttons
                                var buttons = document.getElementsByClassName('timeButton');
                                for (var i = 0; i < buttons.length; i++) {
                                    if (buttons[i] !== button) {
                                        buttons[i].classList.remove('selected');
                                        buttons[i].style.backgroundColor = '#f0f0f0'; // Gray color
                                    }
                                }
                            }

                            function getSelectedDay(button) {
                                // Traverse up the DOM to find the corresponding table cell (td)
                                var cell = button.parentNode;
                                while (cell && cell.tagName !== "TD") {
                                    cell = cell.parentNode;
                                }
                                
                                
                                // Once the table cell is found, get its index to determine the day
                                var dayIndex = cell.cellIndex; // 0 for Monday, 1 for Tuesday, etc.
                                var currentDate = new Date();
                                var currentDay = currentDate.getDate();

                                // Calculate the selected day based on the current day and the clicked day
                                var daysToAdd = dayIndex - (currentDate.getDay() - 0);
                                var selectedDate = new Date(currentDate);
                                selectedDate.setDate(currentDay + daysToAdd);
                                
                                var formattedDay = selectedDate.toLocaleString('en-US', { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' });

                                return formattedDay;
                            }

                            // Add click event listeners to all buttons with class "timeButton"
                            var buttons = document.getElementsByClassName('timeButton');
                            for (var i = 0; i < buttons.length; i++) {
                                buttons[i].addEventListener('click', function() {
                                    toggleButtonColor(this);
                                });
                            }

                            function disablePastMonths() {
                                var monthSelect = document.getElementById('monthSelect');
                                var currentDate = new Date();
                                var currentMonth = currentDate.getMonth() + 2; // Month is zero-based index

                                // Disable months before the current month
                                for (var i = 0; i < currentMonth - 1; i++) {
                                    monthSelect.children[i].disabled = true;
                                }
                                monthSelect.selectedIndex = currentMonth - 2;
                            }

                            // Call the function to disable past months
                            disablePastMonths();

                            function updateScheduleOutput(selectedDay) {
                                const outputField = document.querySelector(".sched-output");
                                outputField.value = selectedDay;
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

    <?php include_once 'template/footer.php';?>
    <script src="script/appointment.js"></script>
</body>
</html>
