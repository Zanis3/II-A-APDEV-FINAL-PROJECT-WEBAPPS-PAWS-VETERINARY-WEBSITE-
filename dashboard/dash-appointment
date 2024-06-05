<?php
?>
<head>
    <title>Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="stylesheet" href="../css/dash_style.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php include_once 'dash-template/dashboard-header.php'; ?>
    <br>
    <br>
    <center>
        <h1 id="greeting"></h1>
        <p><b>This is the Appointments we have so far.</b></p>
        <br>
        <br>
        <div class="bordered-table">
            <table class="font2" id="appointment-table">
                <thead>
                    <tr>
                        <td id="filter-text"></td>
                        <td style="text-align: right" colspan="6">
                            <label for="filter">Filter Appointments:</label>
                            <select id="filter" onchange="filterAppointments()">
                                <option value="all">All Appointments</option>
                                <option value="today">Today's Appointments</option>
                                <option value="pending">Pending Appointments</option>
                                <option value="done">Done Appointments</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th> PetID </th>
                        <th> Pet Name </th>
                        <th> Pet Species </th>
                        <th> Appointment Date </th>
                        <th> Appointment Time </th>
                        <th> Appointment Status </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button onclick="viewMore('More Information')">View More</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <br>
    </center>
    <?php include_once '../template/footer.php'; ?>
    <script src="../script/appointment.js"></script>
    <script>
        function filterAppointments() {
            var filter = document.getElementById("filter").value;
            var rows = document.getElementById("appointment-table").getElementsByTagName('tbody')[0].rows;

            // Set the content of the empty td cell based on the selected filter
            var filterTextCell = document.getElementById("filter-text");
            if (filter === "all") {
                filterTextCell.textContent = "All";
            } else if (filter === "today") {
                filterTextCell.textContent = "Today";
            } else if (filter === "pending") {
                filterTextCell.textContent = "Pending";
            } else if (filter ==="done") {
                filterTextCell.textContent = "Done";
            } else {
                filterTextCell.textContent = "";
            }

            for (var i = 0; i < rows.length; i++) {
                var status = rows[i].cells[5].textContent.trim().toLowerCase();
                if (filter === "all" || status === filter || (i === 0 && status === "")) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>
</body>