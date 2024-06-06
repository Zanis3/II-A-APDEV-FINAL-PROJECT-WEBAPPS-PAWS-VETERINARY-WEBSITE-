<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);
?>
<head>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
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
                <button type="submit" name="scheduleSubmit" >Submit</button>
                <button type="reset" name="clear">Clear</button>
            </div>
        </div>
    </div>
</body>