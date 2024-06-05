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

    <div class="black-background" style="display:<?php if($logoutIsClicked){echo 'block';}else{echo 'none';}?>"></div>

    <!--ADD DOCTORS-->
    <div class="registration-screen" style="display:<?php if($docReg){echo 'block';}else{echo 'none';}?>">
        <div class="registration-header">
            REGISTER DOCTOR
        </div>
        <?php include_once 'dash-template/dashboard-docreg.php';?>
    </div>

    <div class="black-background" style="display:<?php if($docReg){echo 'block';}else{echo 'none';}?>"></div>

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
