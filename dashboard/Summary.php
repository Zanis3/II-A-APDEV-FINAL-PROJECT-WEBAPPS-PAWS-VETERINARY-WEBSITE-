<?php
?>
<head>
    <title>Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="stylesheet" href="../css/dash_style.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel"></script>
</head>
<body>
    <?php include_once 'dash-template/dashboard-header.php'; ?>
    <div class="total">
        <div class="main">
            <h3> Total Appointments </h3>
            <hr class="line">
            <br>
            <div class="items">
                <?php include_once 'dash-template/TotalChart.php'?>
            </div>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <h3> Consultation Appointments </h3>
            <hr class="line">
            <br>
            <div class="items">
                <?php include_once 'dash-template/ConsultationChart.php' ?>
            </div>
            <br>
        </div>
        <div class="content">
            <h3> Grooming Appointment </h3>
            <hr class="line">
            <br>
            <div class="items">
                <?php include_once 'dash-template/GroomingChart.php' ?>
            </div>
            <br>
        </div>
        <br>
    </div>
    <div class="container">
        <div class="content">
            <h3> Dental Appointments </h3>
            <hr class="line">
            <br>
            <div class="items">
                <?php include_once 'dash-template/DentalChart.php'?>
            </div>
            <br>
        </div>
        <div class="content">
            <h3> Check Up Appointment </h3>
            <hr class="line">
            <br>
            <div class="items">
                <?php include_once 'dash-template/CheckUpChart.php' ?>
            </div>
            <br>
        </div>
        <br>
    </div>
    <br>
    <br>
    <?php include_once '../template/footer.php'; ?>
</body>