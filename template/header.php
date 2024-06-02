<div class="header">
    <a href="../II-A-APDEV-FINAL-PROJECT-WEBAPPS-PAWS-VETERINARY-WEBSITE-/index.php" id="header-link">
        <div class="website-logo">
        <?php
            if($location == 'dashboard'){
                echo '<img src="../../img/gen/web-logo.png" class="web-logo">';
            }
            else{
                echo '<img src="img/gen/web-logo.png" class="web-logo">';
            }
        ?>
        
        <h1>Paws Veterinary</h1>
        </div>
    </a>
    <div class="navbar">
        <a href="index.php"><b> Home </b></a>
        <a href="services.php"><b> Services </b></a>
        <a href="appointments.php"><b> Set Appointment </b></a>
        <a href="about.php"><b> About Us </b></a>
        <a href="login/login.php" id="nav-unique"><b> Login </b></a>
    </div>
</div>