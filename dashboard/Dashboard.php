<?php
    require '../template/config.php';

    if($role != 'admin'){
        if($role == 'doctor'){
            header('Location: dashboard-doc.php');
        }
        else{
            header('Location: ../index.php');
        }
    }

    $logoutIsClicked = false;

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['btnLogout'])){
            $logoutIsClicked = true;
        }

        if(isset($_POST['btnConfirmLogout'])){
            session_destroy();
            $isLoggedIn = false;
            header('Location: ../index.php');
        }

        if(isset($_POST['btnStayLoggedIn'])){
            $logoutIsClicked = false;
        }
    }

    $checkup = false;
    $dental = false;
    $grooming = false;
    $vaccination = false;
    $surgery = false;

    if($_SERVER['REQUEST_METHOD']==="POST"){
        if(isset($_POST['btnCheckUp'])){
            $checkup = true;
        }
        if(isset($_POST['btnDental'])){
            $dental = true;
        }
        if(isset($_POST['btnGrooming'])){
            $grooming = true;
        }
        if(isset($_POST['btnVaccination'])){
            $vaccination = true;
        }
        if(isset($_POST['btnSurgery'])){
            $surgery = true;
        }
    }
?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="stylesheet" href="../css/dash_style.css">
    <link rel="stylesheet" href="../css/dashboard_styles/style_docreg.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include_once 'dash-template/dashboard-header.php';?>

    <!--LOGOUT CONFIRMATION-->
    <div class="information-screen" style="display:<?php if($logoutIsClicked){echo 'block';}else{echo 'none';}?>">
        <div class="information-header">
            <i class="fas fa-sign-out-alt"></i>
            CONFIRM LOGOUT
        </div>
        <p class="information-desc">Are you sure you want to logout?</a></p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="logout-confirm-btns">
            <input type="submit" name="btnConfirmLogout" class="logout-btn yes" value="Yes"> 
            <input type="submit" name="btnStayLoggedIn" class="logout-btn" value="No">
        </form>
    </div>

    <!--ADD DOCTORS-->
    <?php if($docReg):?>    
        <div class="registration-screen">
            <div class="registration-header">
                REGISTER DOCTOR
            </div>
            <?php include_once 'dash-template/dashboard-docreg.php';?>
        </div>
    <?php endif;?>  

    <div class="black-background" style="display:<?php if($logoutIsClicked || $docReg){echo 'block';}else{echo 'none';}?>"></div>

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
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <input type="submit" name="btnLogout" value="Logout" class="logout-btn yes">
                </form>
            </div>
        </div>
        <p style="margin-left: 50px;"><b>Choose the Category</b></p>
    </div>
    <div class="services">
        <div class="service-container" onclick="showServiceContent('checkup')">
            <i class="fas fa-clipboard-check" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <input type="submit" name="btnCheckUp" value="Check Up" class="btnServices">
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('dental')">
            <i class="fas fa-tooth" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <input type="submit" name="btnDental" value="Dental" class="btnServices">
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('grooming')">
            <i class="fas fa-cut" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <input type="submit" name="btnGrooming" value="Grooming" class="btnServices">
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('vaccination')">
            <i class="fas fa-syringe" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <input type="submit" name="btnVaccination" value="Vaccination" class="btnServices">
            <hr class="line">
        </div>
        <div class="service-container" onclick="showServiceContent('surgery')">
            <i class="fas fa-heartbeat" style="font-size: 30px; color: #65A30D"></i>
            <br>
            <input type="submit" name="btnSurgery" value="Surgery" class="btnServices">
            <hr class="line">
        </div>
    </div>
    <br>
    <div id="service-content">
        
    </div>
    <div class="hidden">
        <?php if($checkup):?>
            <div class="wide">
                <div class="patient-section">
                    <h2 id="patient-heading">Patients</h2>
                    <div class="filter-options">
                        <label for="filter">Filter:</label>
                        <select id="filter" onchange="updatePatientHeading(this.value)">
                            <option value="today">Today</option>
                            <option value="this-week">This Week</option>
                            <option value="this-month">This Month</option>
                        </select>
                    </div>
                </div>
                <table class="patients-table">
                    <tr>
                        <th>Appointment ID</th>
                        <th>Pet Name</th>
                        <th>Owner</th>
                        <th>Vet</th>
                        <th>Schedule</th>
                    </tr>
                </table>
            </div>
            <div class="narrow">
                <div class="info-container">
                    <p><b>You have a total of</b></p>
                    <h2></h2>
                    <p><b>Check Up Appointments</b></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="hidden">
        <?php if($dental):?>
            <div class="wide">
                <div class="patient-section">
                    <h2 id="patient-heading">Patients</h2>
                    <div class="filter-options">
                        <label for="filter">Filter:</label>
                        <select id="filter" onchange="updatePatientHeading(this.value)">
                            <option value="today">Today</option>
                            <option value="this-week">This Week</option>
                            <option value="this-month">This Month</option>
                        </select>
                    </div>
                </div>
                <table class="patients-table">
                    <tr>
                        <th>Appointment ID</th>
                        <th>Pet Name</th>
                        <th>Owner</th>
                        <th>Vet</th>
                        <th>Schedule</th>
                    </tr>
                </table>
            </div>
            <div class="narrow">
                <div class="info-container">
                <p><b>You have a total of</b></p>
                <h2></h2>
                <p><b>Dental Appointments</b></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="hidden">
        <?php if($grooming):?>
            <div class="wide">
                <div class="patient-section">
                    <h2 id="patient-heading">Patients</h2>
                    <div class="filter-options">
                        <label for="filter">Filter:</label>
                        <select id="filter" onchange="updatePatientHeading(this.value)">
                            <option value="today">Today</option>
                            <option value="this-week">This Week</option>
                            <option value="this-month">This Month</option>
                        </select>
                    </div>
                </div>
                <table class="patients-table">
                    <tr>
                        <th>Appointment ID</th>
                        <th>Pet Name</th>
                        <th>Owner</th>
                        <th>Vet</th>
                        <th>Schedule</th>
                    </tr>
                </table>
            </div>
            <div class="narrow">
                <div class="info-container">
                    <p><b>You have a total of</b></p>
                    <h2></h2>
                    <p><b>Grooming Appointments</b></p>
                </div>
            </div>
        <?php endif;?>
    </div>
    <div class="hidden">
        <?php if($vaccination): ?>
            <div class="wide">
                <div class="patient-section">
                    <h2 id="patient-heading">Patients</h2>
                    <div class="filter-options">
                        <label for="filter">Filter:</label>
                        <select id="filter" onchange="updatePatientHeading(this.value)">
                            <option value="today">Today</option>
                            <option value="this-week">This Week</option>
                            <option value="this-month">This Month</option>
                        </select>
                    </div>
                </div>
                <table class="patients-table">
                    <tr>
                        <th>Appointment ID</th>
                        <th>Pet Name</th>
                        <th>Owner</th>
                        <th>Vet</th>
                        <th>Schedule</th>
                    </tr>
                </table>
            </div>
            <div class="narrow">
                <div class="info-container">
                    <p><b>You have a total of</b></p>
                    <h2></h2>
                    <p><b>Vaccination Appointments</b></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="hidden">
        <?php if($surgery): ?>
            <div class="wide">
                <div class="patient-section">
                    <h2 id="patient-heading">Patients</h2>
                    <div class="filter-options">
                        <label for="filter">Filter:</label>
                        <select id="filter" onchange="updatePatientHeading(this.value)">
                            <option value="today">Today</option>
                            <option value="this-week">This Week</option>
                            <option value="this-month">This Month</option>
                        </select>
                    </div>
                </div>
                <table class="patients-table">
                    <tr>
                        <th>Appointment ID</th>
                        <th>Pet Name</th>
                        <th>Owner</th>
                        <th>Vet</th>
                        <th>Schedule</th>
                    </tr>
                </table>
            </div>
            <div class="narrow">
                <div class="info-container">
                    <p><b>You have a total of</b></p>
                    <h2></h2>
                    <p><b>Surgery Appointments</b></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <script src="../script/dashboard-navbar.js"></script>
    <script src="../script/dashboard-services.js"></script>
    <script src="../script/filter.js"></script>
</body>
