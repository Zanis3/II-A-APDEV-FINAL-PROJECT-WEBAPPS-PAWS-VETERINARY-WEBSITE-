<?php
?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="stylesheet" href="../css/dash_style.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include_once 'dash-template/dashboard-header.php';?>
    <div class="left-content">
        <div class="top-container">
            <div class="admin-container">
                <table>
                    <tr>
                        <td rowspan="2">
                            <div class="circle">
                                <i class="fas fa-user" style="font-size: 30px; color: white;"></i>
                            </div>
                        </td>
                        <td style="padding-left: 40px;"><h2 style="margin: 0;">Welcome Back Admin!</h2></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 40px;"><p style="margin: 0;">Check the updates logged so far!</p></td>
                    </tr>
                </table>
            </div>
            <div class="logout-container">
                <button type="submit" name="btnLogOut"><b>Log Out</b></button>
            </div>
        </div>
        <p style="margin-left: 50px;"><b>Choose the Category</b></p>
    </div>
    <div class="services">
        <div class="service-container" onclick="showServiceContent('checkup')">
            <i class="fas fa-clipboard-check" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <p><b>Check Up</b></p>
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('dental')">
            <i class="fas fa-tooth" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <p><b>Dental</b></p>
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('grooming')">
            <i class="fas fa-cut" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <p><b>Grooming</b></p>
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('consultation')">
            <i class="fas fa-clipboard-list" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <p><b>Consultation</b></p>
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('vaccination')">
            <i class="fas fa-syringe" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <p><b>Vaccination</b></p>
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('surgery')">
            <i class="fas fa-heartbeat" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <p><b>Surgery</b></p>
            <hr class="line">
        </div>
    </div>
    <br>
    <div id="service-content">
        <!-- Dynamic content for services will be loaded here -->
    </div>
    <script src="../script/dashboard-navbar.js"></script>
    <script src="../script/dashboard-services.js"></script>
    <script src="../script/filter.js"></script>
    <script src="../script/chart.js"></script>
</body>
