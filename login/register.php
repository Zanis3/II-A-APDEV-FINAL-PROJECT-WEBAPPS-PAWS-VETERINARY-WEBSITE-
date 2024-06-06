<?php
    require '../template/config.php';

    $lastNameError = '';
    $firstNameError = '';
    $emailError = '';
    $contactNoError = '';
    $addressError = '';
    $usernameError = '';
    $passwordError = '';
    $confirmPasswordError = '';

    $registerSuccess = false;

    function emptyError($value){
        if(empty($value)){
            return 'Empty Field';
        }
    }

    function sanitizeInput($value){
        return htmlspecialchars(strip_tags($value));
    }

    #REDIRECT SA HOME PAGE PAG LOGGED IN NA
    if($isLoggedIn){
        if($role == 'user'){
            header('Location: ../index.php');
        }
        elseif($role == 'doctor'){
            header('Location: ../dashboard/dashboard-doc.php');
        }
        else{
            header('Location: ../dashboard/Dashboard.php');
        }
    }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $lastName = sanitizeInput(ucwords($_POST['txtLastName']));
        $firstName = sanitizeInput(ucwords($_POST['txtFirstName']));
        $middleInitial = sanitizeInput(ucwords($_POST['txtMiddleInitial']));

        $email = sanitizeInput($_POST['txtEmail']);
        $contactNumber = sanitizeInput($_POST['txtContactNumber']);
        $address = sanitizeInput($_POST['txtAddress']);

        $userName = sanitizeInput($_POST['txtUsername']);
        $password = sanitizeInput($_POST['txtPassword']);
        $confirmPassword = sanitizeInput($_POST['txtConfirmPassword']);

        $userNameLength = strlen($userName);
        $passwordLength = strlen($password);

        $registerValidation = true;

        if(isset($_POST['btnRegister'])){
            
            #CHINECHECK KUNG EMPTY UNG REQUIRED FIELDS
            if(empty($lastName) || empty($firstName) || empty($email) || empty($contactNumber) || empty($address) || empty($userName) || empty($password) || empty($confirmPassword)){
                $lastNameError = emptyError($lastName);
                $firstNameError = emptyError($firstName);
                $emailError = emptyError($email);
                $contactNoError = emptyError($contactNumber);
                $addressError = emptyError($address);
                $usernameError = emptyError($userName);
                $passwordError = emptyError($password);
                $confirmPasswordError = emptyError($confirmPassword);

                $registerValidation = false;
            }

            #CHINECHECK KUNG MAY SPECIAL CHARACTERS SA NAME
            if(!preg_match("/^[a-zA-Z-' ]*$/", $lastName) || !preg_match("/^[a-zA-Z-' ]*$/", $firstName)){
                if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
                    $lastNameError = 'Only letters and white space allowed.';
                }

                if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
                    $firstNameError = 'Only letters and white space allowed.';
                }

                $registerValidation = false;
            }

            #CHINECHECK KUNG MAY USERNAME AND EMAIL SA DATABASE NA UNG TINYPE NG USER
            $query1 = $connection->prepare('SELECT * FROM tbl_logininfo WHERE userEmail = ? LIMIT 1');
            $query1->bind_param('s', $email);
            $query1->execute();
            $findEmail = $query1->get_result();
            $emailQuery = $findEmail->fetch_assoc();
            $query1->close();

            $query2 = $connection->prepare('SELECT * FROM tbl_logininfo WHERE username = ? LIMIT 1');
            $query2->bind_param('s', $userName);
            $query2->execute();
            $findUsername = $query2->get_result();
            $userNameQuery = $findUsername->fetch_assoc();
            $query2->close();

            if($emailQuery['userEmail'] == $email && !empty($email)){
                $emailError = 'Email already found in the database. Please login or register a new email.';
                $registerValidation = false;
            }

            if($userNameQuery['username'] == $userName && !empty($userName)){
                $usernameError = 'Username already found in the database. Please login or register a new email.';
                $registerValidation = false;
            }

            #CHINECHECK YUNG LENGTH NG USERNAME AT PASSWORD
            if($userNameLength < 6 || $passwordLength < 8){
                if($userNameLength < 6 && empty($usernameError)){
                    $usernameError = 'Username should be six characters or more.';
                }

                if($passwordLength < 8 && empty($passwordError)){
                    $passwordError = 'Password should be eight characters or more.';
                }
                $registerValidation = false;
            }

            #CHINECHECK ANG FORMAT NG EMAIL AT CONTACT NUMBERR
            if(!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email) && !empty($email)){
                $emailError = "Invalid Email";
                $registerValidation = false;
            }

            if(!preg_match('/^(\+639\d{2}|09\d{2})[- ]?\d{3}[- ]?\d{4}$/', $contactNumber) && !empty($contactNumber)){
                $contactNoError = "Invalid Number";
                $registerValidation = false;
            }

            #CHINECHECK KUNG PAREHAS BA ANG SINULAT NI USER SA PASSWORD AT CONFIRM PASSWORD
            if($confirmPassword != $password && empty($confirmPasswordError)){
                $confirmPasswordError = 'Password does not match.';
                $registerValidation = false;
            }

            #REGISTRATION NA
            if($registerValidation){
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                $userType = 'user';

                $registerAccount = $connection->prepare('INSERT INTO tbl_logininfo (username, userEmail, userPass, userType) VALUES (?, ?, ?, ?)');
                $registerAccount->bind_param('ssss', $userName, $email, $hashedPass, $userType);
                $registerAccount->execute();
                $registerAccount->close();

                $loginID = $connection->insert_id;

                $registerAdditionalInfo = $connection->prepare('INSERT INTO tbl_contactinfo (loginID, contactLastName, contactFirstName, contactMiddleInitial, contactNumber, contactAddress, contactType) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $registerAdditionalInfo->bind_param('issssss', $loginID, $lastName, $firstName, $middleInitial, $contactNumber, $address, $userType);
                $registerAdditionalInfo->execute();
                $registerAdditionalInfo->close();

                $contactID = $connection->insert_id;

                $registerUser = $connection->prepare('INSERT INTO tbl_userinfo (contactID) VALUES (?)');
                $registerUser->bind_param('i', $contactID);
                $registerUser->execute();
                $registerUser->close();

                $registerSuccess = true;
            }
        }
    }
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_login.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <title>USER REGISTRATION</title>
</head>

<body>
    <div class="container register">

        <!--SCREEN THAT APPEARS WHEN REGISTRATION IS SUCCESSFUL-->
        <div class="information-screen" style="display:<?php if($registerSuccess){echo 'block';}else{echo 'none';}?>">
            <div class="information-header">
                <i class="fas fa-check-circle"></i>
                SUCCESS
            </div>
            <p class="information-desc">Your registration has been successful. Please return to the <a href="login.php">login screen.</a></p>
        </div>

        <div class="black-background" style="display:<?php if($registerSuccess){echo 'block';}else{echo 'none';}?>"></div>

        <!--REGISTER FIELD-->
        <div class="floating">

            <div class="title-field">
                <h2 class="text-title">ACCOUNT REGISTRATION</h2>
                <hr class="line">
                <p class="warning-ins">* - required</p>
            </div>
            
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

                    <!--ADDRESS FIELD-->
                    <div class="contact-item">
                        <span>
                            <label for="txtAddress">Address:</label>
                            <p class="warning">*<?php echo htmlspecialchars($addressError);?></p>
                        </span>
                        <input type="text" name="txtAddress" id="txtAddress" class="input-text" placeholder="Address" value="<?php echo htmlspecialchars($_POST['txtAddress']);?>">
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
                </div>
            </form>

            <!--BACK TO LOGIN-->
            <p class="text-sub"><a href="login.php">Back to Login</a></p>
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
    </script>
</body>