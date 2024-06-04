<?php
    if(isset($_POST['btnViewAppointments'])){
        if($location == 'folder'){
            header('Location: ../user/user-profile.php');
        }
        else{
            header('Location: user/user-profile.php');
        }
    }

    if(isset($_POST['btnAccountSettings'])){
        if($location == 'folder'){
            header('Location: ../user/user-settings.php');
        }
        else{
            header('Location: user/user-settings.php');
        }
    }

    if(isset($_POST['btnLogout'])){
        setcookie('isLoggedIn', $_SESSION['login'], time() - (86400 * 15), '/');
        setcookie('username', $_SESSION['username'], time() - (86400 * 15), '/');
        session_destroy();
        $isLoggedIn = false;
        header('Location: index.php');
    }
?>

<div class="header">
    <?php if($location == 'folder'):?>
        <a href="../../II-A-APDEV-FINAL-PROJECT-WEBAPPS-PAWS-VETERINARY-WEBSITE-/index.php" id="header-link">
    <?php else:?>
        <a href="../II-A-APDEV-FINAL-PROJECT-WEBAPPS-PAWS-VETERINARY-WEBSITE-/index.php" id="header-link">
    <?php endif;?>
        <div class="website-logo">
            <?php
                if($location == 'folder'){
                    echo '<img src="../img/gen/web-logo.png" class="web-logo">';
                }
                else{
                    echo '<img src="img/gen/web-logo.png" class="web-logo">';
                }
            ?>
            
            <h1>Paws Veterinary</h1>
        </div>
    </a>
    <div class="navbar">
        <?php if($location == 'folder'):?>
            <a href="../index.php"><b> Home </b></a>
            <a href="../services.php"><b> Services </b></a>
            <a href="../appointments.php"><b> Set Appointment </b></a>
            <a href="../about.php"><b> About Us </b></a>
        <?php else:?>
            <a href="index.php"><b> Home </b></a>
            <a href="services.php"><b> Services </b></a>
            <a href="appointments.php"><b> Set Appointment </b></a>
            <a href="about.php"><b> About Us </b></a>
        <?php endif;?>

        <?php if($isLoggedIn): ?>
            <button id = "logged-in-user"><i class="fas fa-2x fa-user-circle"></i></button>
            <div id="profile-dropdown">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="header-form">
                    <input type="submit" name="btnViewAppointments" value="View Appointments" class="profile-nav">
                    <input type="submit" name="btnAccountSettings" value="Account Settings" class="profile-nav">
                    <input type="submit" name="btnLogout" value="Logout" class="profile-nav log-out">
                </form>
            </div>
        <?php else: ?>
            <a href="login/login.php" id="nav-unique"><b> Login </b></a>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var userButton = document.getElementById('logged-in-user');
            var dropdown = document.getElementById('profile-dropdown');
            var isDropdownVisible = false;
            
            userButton.addEventListener('click', function(event) {
                if(!isDropdownVisible) {
                    dropdown.style.animation = 'slideDown 1s forwards';
                    dropdown.style.display = 'flex';
                    userButton.style.color = 'var(--light-green)';
                    isDropdownVisible = true;
                } else {
                    dropdown.style.animation = 'slideUp 1s forwards';
                    dropdown.style.display = 'none';
                    userButton.style.color = 'var(--dark-green)';
                    isDropdownVisible = false;
                }
                
                event.stopPropagation();
            });

            window.addEventListener('click', function(event) {
                if(isDropdownVisible && !event.target.matches('#logged-in-user')) {
                    dropdown.style.animation = 'slideUp 1s forwards';
                    dropdown.style.display = 'none';
                    isDropdownVisible = false;
                }
            });
        });
    </script>
</div>