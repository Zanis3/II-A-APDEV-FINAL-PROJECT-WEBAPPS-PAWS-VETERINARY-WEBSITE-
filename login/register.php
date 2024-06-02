<?php
    require '../template/config.php';

    $lastNameError = '';
    $firstNameError = '';
    $emailError = '';
    $contactNoError = '';
    $usernameError = '';
    $passwordError = '';
    $confirmPasswordError = '';

    function emptyError($value){
        if(empty($value)){
            return 'Empty Field';
        }
    }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $lastName = $_POST['txtLastName'];
        $firstName = $_POST['txtFirstName'];
        $middleInitial = $_POST['txtMiddleInitial'];

        $email = $_POST['txtEmail'];
        $contactNumber = $_POST['txtContactNumber'];

        $userName = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $confirmPassword = $_POST['txtConfirmPassword'];

        $usernameLength = strlen($userName);
        $passwordLength = strlen($password);

        $check = 0;

        if(isset($_POST['btnRegister'])){
            
            #CHINECHECK KUNG EMPTY UNG REQUIRED FIELDS
            if(empty($lastName) || empty($firstName) || empty($email) || empty($contactNumber) || empty($userName) || empty($password) || empty($confirmPassword)){
                $lastNameError = emptyError($lastName);
                $firstNameError = emptyError($firstName);
                $emailError = emptyError($email);
                $contactNoError = emptyError($contactNumber);
                $usernameError = emptyError($userName);
                $passwordError = emptyError($password);
                $confirmPasswordError = emptyError($confirmPassword);
            }
            else{
                $check += 1;
            }

            #CHINECHECK KUNG MAY SPECIAL CHARACTERS SA NAME
            if(!preg_match("/^[a-zA-Z-' ]*$/", $lastName) || !preg_match("/^[a-zA-Z-' ]*$/", $firstName)){
                if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
                    $lastNameError = 'Only letters and white space allowed.';
                }

                if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
                    $firstNameError = 'Only letters and white space allowed.';
                }
            }
            else{
                $check += 1;
            }

            #CHINECHECK KUNG MAY USERNAME AND EMAIL SA DATABASE NA UNG TINYPE NG USER
            $registerUserInfo = $connection->execute_query('SELECT * FROM tbl_userinfo WHERE userEmail = ? LIMIT 1', [$email]);
            $userInfo = $registerUserInfo->fetch_assoc();

            $registerLoginInfo = $connection->execute_query('SELECT * FROM tbl_logininfo WHERE username = ? LIMIT 1', [$userName]);
            $loginInfo = $registerLoginInfo->fetch_assoc();

            if($userInfo['userEmail'] == $email && !empty($email)){
                $emailError = 'Email already found in the database. Please login or register a new email.';
            }
            else{
                $check += 1;
            }

            if($loginInfo['username'] == $userName && !empty($userName)){
                $usernameError = 'Username already found in the database. Please login or register a new email.';
            }
            else{
                $check += 1;
            }

            $registerUserInfo->close();
            $registerLoginInfo->close();

            #CHINECHECK YUNG LENGTH NG USERNAME AT PASSWORD
            if($userNameLength < 6 || $passwordLength < 8){
                if($userNameLength < 6 && empty($usernameError)){
                    $usernameError = 'Username should be six characters or more.';
                }

                if($passwordLength < 8 && !empty($password)){
                    $passwordError = 'Password should be eight characters or more.';
                }
            }
            else{
                $check += 1;
            }

            #CHINECHECK ANG FORMAT NG EMAIL AT CONTACT NUMBERR
            if(!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email) && !empty($email)){
                $emailError = "Invalid Email";
            }
            else{
                $check += 1;
            }

            if(!preg_match('/^(\+639\d{2}|09\d{2})[- ]?\d{3}[- ]?\d{4}$/', $contactNumber) && !empty($contactNumber)){
                $contactNoError = "Invalid Number";
            }
            else{
                $check += 1;
            }

            #CHINECHECK KUNG PAREHAS BA ANG SINULAT NI USER SA PASSWORD AT CONFIRM PASSWORD
            if($confirmPassword != $password && empty($confirmPasswordError)){
                $confirmPasswordError = 'Password does not match.';
            }
            else{
                $check += 1;
            }

            #REGISTRATION NA
            if($check == 8){
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            }
        }
    }
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_login.css">
</head>

<body>
    <div class="container register">
        <div class="floating">

            <h2 class="text-title">REGISTER</h2>
            <hr class="line">
            <p class="warning-ins">* - required</p>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="form-register">

                <div class="name-container">

                    <!--LAST NAME FIELD-->
                    <div class="name-item">
                        <span>
                            <label for="txtLastName">Last Name</label>
                            <p class="warning">*<?php echo htmlspecialchars($lastNameError);?></p>
                        </span>
                        
                        <input type="text" name="txtLastName" id="txtLastName" class="input-text" placeholder="Last Name" value="<?php echo htmlspecialchars($_POST['txtLastName']);?>">
                    </div>

                    <!--FIRST NAME FIELD-->
                    <div class="name-item">
                        <span>
                            <label for="txtFirstName">First Name</label>
                            <p class="warning">*<?php echo htmlspecialchars($firstNameError);?></p>
                        </span>
                        <input type="text" name="txtFirstName" id="txtFirstName" class="input-text" placeholder="First Name" value="<?php echo htmlspecialchars($_POST['txtFirstName']);?>">
                    </div>
                    
                    <!--MIDDLE INITIAL FIELD-->
                    <div class="name-item mi">
                        <label for="txtMiddleInitial">M.I.</label>
                        <input type="text" name="txtMiddleInitial" id="txtMiddleInitial" class="input-text" placeholder="M.I." value="<?php echo htmlspecialchars($_POST['txtMiddleInitial']);?>">
                    </div>
                </div>

                <div class="contact-container">

                    <!--EMAIL FIELD-->
                    <div class="contact-item">
                        <span>
                            <label for="txtEmail">Email</label>
                            <p class="warning">*<?php echo htmlspecialchars($emailError);?></p>
                        </span>
                        <input type="email" name="txtEmail" id="txtEmail" class="input-text" placeholder="Email" value="<?php echo htmlspecialchars($_POST['txtEmail']);?>">
                    </div>

                    <!--CONTACT NUMBER FIELD-->
                    <div class="contact-item">
                        <span>
                            <label for="txtContactNumber">Contact No.</label>
                            <p class="warning">*<?php echo htmlspecialchars($contactNoError);?></p>
                        </span>
                        <input type="tel" name="txtContactNumber" id="txtContactNumber" class="input-text" pattern="(\+639\d{2}|\d{4})[- ]?\d{3}[- ]?\d{4}" placeholder="Contact No. (09XX-XXX-XXXX or +639XX-XXX-XXXX)" maxlength = "14" value="<?php echo htmlspecialchars($_POST['txtContactNumber']);?>">
                    </div>


                    <!--USERNAME FIELD-->
                    <div class="contact-item">
                        <span>
                            <label for="txtUsername">Username</label>
                            <p class="warning">*<?php echo htmlspecialchars($usernameError);?></p>
                        </span>
                        <input type="text" name="txtUsername" id="txtUsername" class="input-text" placeholder="Username (Minimum 6 characters)" value="<?php echo htmlspecialchars($_POST['txtUsername']);?>">
                    </div>
                </div>

                <div class="password-container-register">

                    <!--PASSWORD FIELD-->
                    <div class="password-item">
                        <div class="pass-sub">
                            <span>
                                <label for="txtPassword">Password: </label>
                                <p class="warning">*<?php echo htmlspecialchars($passwordError);?></p>
                            </span>
                            
                            <input type="password" name="txtPassword" id="txtPassword" class="input-text txtPassword" placeholder="Password (Minimum 8 characters)" style="margin-bottom:20px;" value="<?php echo htmlspecialchars($_POST['txtPassword']);?>">
                        </div>
                        
                        <button type="button" class="btnShow" name="btnShow">Show</button>
                    </div>

                    <!--CONFIRM PASSWORD FIELD-->
                    <div class="password-item">
                        <div class="pass-sub">
                            <span>
                                <label for="txtConfirmPassword">Confirm Password: </label>
                                <p class="warning">*<?php echo htmlspecialchars($confirmPasswordError);?></p>
                            </span>
                            <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" class="input-text txtPassword" placeholder="Confirm Password" style="margin-bottom:20px;" value="<?php echo htmlspecialchars($_POST['txtConfirmPassword']);?>">
                        </div>
                        <button type="button" class="btnShow" name="btnShow">Show</button>
                    </div>
                </div>

                <!--BUTTON CONTAINERS-->
                <div class="button-containers">
                    <input type="submit" name="btnRegister" class="btnLogin" value="Register">
                    <input type="reset" name="btnClear" class="btnLogin" id="clear" value="Clear" onclick="clearForm()">
                </div>
            </form>

            <!--BACK TO LOGIN-->
            <p class="text-sub" style="margin-top:20px;">Back to <a href="login.php">Login</a></p>
        </div>
    </div>
    
    <script>
        //SHOW OR HIDE PASSWORD
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

        //NILILIMIT ANG INPUT SA CONTACT
        document.getElementById('txtContactNumber').addEventListener('input', function (e) {
            let value = e.target.value;
            e.target.value = value.replace(/[^0-9+\- ]/g, '');
        });

        //CLEAR BUTTON
        function clearForm() {
            document.getElementById('form-register').reset();

            const warnings = document.querySelectorAll('.warning');
            warnings.forEach(warning => {
                warning.textContent = '*';
            });

            const inputFields = document.querySelectorAll('.input-text');
            inputFields.forEach(field => {
                field.value = '';
            });
        }
    </script>
</body>