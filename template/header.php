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
        <?php
            $isLoggedIn = $_SESSION['login'];

            if($isLoggedIn){
                echo '<button class = "logged-in-user">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </button>';
            }
            else{
                echo '<a href="login/login.php" id="nav-unique"><b> Login </b></a>';
            }
        ?>
    </div>
</div>