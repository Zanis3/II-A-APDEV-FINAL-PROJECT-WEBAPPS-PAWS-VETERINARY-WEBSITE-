<?php
    require 'template/config.php';
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <div class="container register">
        <div class="floating">
            <h2 class="text-title">REGISTER</h2>
            <hr class="line">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="form-register">
                <div class="name-container">
                    <div class="name-item">
                        <label for="txtLastName">Last Name</label>
                        <input type="text" name="txtLastName" id="txtLastName" class="input-text" placeholder="Last Name">
                    </div>
                    <div class="name-item">
                        <label for="txtFirstName">First Name</label>
                        <input type="text" name="txtFirstName" id="txtFirstName" class="input-text" placeholder="First Name">
                    </div>
                    <div class="name-item mi">
                        <label for="txtMiddleInitial">M.I.</label>
                        <input type="text" name="txtMiddleInitial" id="txtMiddleInitial" class="input-text" placeholder="M.I.">
                    </div>
                </div>

                <div class="contact-container">
                    <div class="contact-item">
                        <label for="txtEmail">Email</label>
                        <input type="email" name="txtEmail" id="txtEmail" class="input-text" placeholder="Email">
                    </div>
                    <div class="contact-item">
                        <label for="txtContactNumber">Contact No.</label>
                        <input type="number" name="txtContactNumber" id="txtContactNumber" class="input-text" placeholder="Contact No.">
                    </div>
                    <div class="contact-item">
                        <label for="txtUsername">Username</label>
                        <input type="text" name="txtUsername" id="txtUsername" class="input-text" placeholder="Username">
                    </div>
                </div>

                <div class="password-container-register">
                    <div class="password-item">
                        <div class="pass-sub">
                            <label for="txtPassword">Password: </label>
                            <input type="password" name="txtPassword" id="txtPassword" class="input-text txtPassword" placeholder="Password" style="margin-bottom:20px;">
                        </div>
                        
                        <button type="button" class="btnShow" name="btnShow">Show</button>
                    </div>
                    <div class="password-item">
                        <div class="pass-sub">
                            <label for="txtConfirmPassword">Confirm Password: </label>
                            <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" class="input-text txtPassword" placeholder="Confirm Password" style="margin-bottom:20px;">
                        </div>
                        <button type="button" class="btnShow" name="btnShow">Show</button>
                    </div>
                </div>

                <div class="button-containers">
                    <input type="submit" name="btnRegister" class="btnLogin" value="Register">
                    <input type="reset" name="btnClear" class="btnLogin" id="clear" value="Clear">
                </div>
            </form>
            <p class="text-sub" style="margin-top:20px;">Back to <a href="../II-A-APDEV-FINAL-PROJECT-WEBAPPS-PAWS-VETERINARY-WEBSITE-/login.php">Login</a></p>
        </div>
    </div>
    
    <script>
        document.querySelectorAll('.btnShow').forEach(function(btnShow) {
            btnShow.addEventListener('click', function(event){
                var passwordField = btnShow.previousElementSibling.querySelector('.txtPassword');
                if(passwordField.type === "password"){
                    passwordField.type = "text";
                    btnShow.textContent = "Hide";
                } 
                else{
                    passwordField.type = "password";
                    btnShow.textContent = "Show";
                }
            });
        });
    </script>
</body>