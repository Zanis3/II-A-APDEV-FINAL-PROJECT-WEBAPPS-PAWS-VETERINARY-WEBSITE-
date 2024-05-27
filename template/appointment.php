<?php

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
</body>