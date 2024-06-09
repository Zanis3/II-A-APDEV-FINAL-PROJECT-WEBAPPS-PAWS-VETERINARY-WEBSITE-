<?php
    require '../../template/config.php';

    function emptyError($value){
        if(empty($value)){
            return 'Empty Field';
        }
    }

    function sanitizeInput($value){
        return htmlspecialchars(strip_tags(trim($value)));
    }

    $lastNameError = '';
    $firstNameError = '';
    $selectRoleError = '';
    $emailError = '';
    $contactNoError = '';
    $addressError = '';
    $usernameError = '';
    $passwordError = '';
    $confirmPasswordError = '';

    $docRegValidation = true;

    $registerSuccess = false;

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $lastName = sanitizeInput(ucwords($_POST['txtLastName']));
        $firstName = sanitizeInput(ucwords($_POST['txtFirstName']));
        $middleInitial = sanitizeInput(ucwords($_POST['txtMiddleInitial']));

        $role = sanitizeInput($_POST['txtDocRole']);

        $email = sanitizeInput($_POST['txtEmail']);
        $contactNumber = sanitizeInput($_POST['txtContactNo']);
        $address = sanitizeInput($_POST['txtAddress']);

        $username = sanitizeInput($_POST['txtUsername']);
        $password = sanitizeInput($_POST['txtPassword']);
        $confirmPassword = sanitizeInput($_POST['txtConfirmPassword']);

        $usernameLength = strlen($username);
        $passwordLength = strlen($password);

        if(isset($_POST['btnAddDoctor'])){

            #CHINECHECK KUNG EMPTY UNG REQUIRED FIELDS
            if(empty($lastName) || empty($firstName) || empty($role) || empty($email) || empty($contactNumber) || empty($username) || empty($password) || empty($confirmPassword)){
                $lastNameError = emptyError($lastName);
                $firstNameError = emptyError($firstName);
                $emailError = emptyError($email);
                $contactNoError = emptyError($contactNumber);
                $addressError = emptyError($address);
                $usernameError = emptyError($username);
                $passwordError = emptyError($password);
                $confirmPasswordError = emptyError($confirmPassword);
                $selectRoleError = emptyError($role);

                $docRegValidation = false;
            }

            #CHINECHECK KUNG MAY SPECIAL CHARACTERS SA NAME
            if(!preg_match("/^[a-zA-Z-' ]*$/", $lastName) || !preg_match("/^[a-zA-Z-' ]*$/", $firstName)){
                if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
                    $lastNameError = 'Only letters and white space allowed.';
                }

                if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
                    $firstNameError = 'Only letters and white space allowed.';
                }

                $docRegValidation = false;
            }

            #CHINECHECK KUNG MAY USERNAME AND EMAIL SA DATABASE NA UNG TINYPE NG USER
            $query1 = $connection->prepare('SELECT * FROM tbl_logininfo WHERE userEmail = ? LIMIT 1');
            $query1->bind_param('s', $email);
            $query1->execute();
            $findEmail = $query1->get_result();
            $emailQuery = $findEmail->fetch_assoc();
            $query1->close();

            $query2 = $connection->prepare('SELECT * FROM tbl_logininfo WHERE username = ? LIMIT 1');
            $query2->bind_param('s', $username);
            $query2->execute();
            $findUsername = $query2->get_result();
            $userNameQuery = $findUsername->fetch_assoc();
            $query2->close();

            if($emailQuery['userEmail'] == $email && !empty($email)){
                $emailError = 'Email already found in the database. Please login or register a new email.';
                $docRegValidation = false;
            }

            if($userNameQuery['username'] == $username && !empty($username)){
                $usernameError = 'Username already found in the database. Please login or register a new email.';
                $docRegValidation = false;
            }

            #CHINECHECK YUNG LENGTH NG USERNAME AT PASSWORD
            if($usernameLength < 6 || $passwordLength < 8){
                if($usernameLength < 6 && empty($usernameError)){
                    $usernameError = 'Username should be six characters or more.';
                }

                if($passwordLength < 8 && empty($passwordError)){
                    $passwordError = 'Password should be eight characters or more.';
                }
                $docRegValidation = false;
            }

            #CHINECHECK ANG FORMAT NG EMAIL AT CONTACT NUMBERR
            if(!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email) && !empty($email)){
                $emailError = "Invalid Email";
                $docRegValidation = false;
            }

            if(!preg_match('/^(\+639\d{2}|09\d{2})[- ]?\d{3}[- ]?\d{4}$/', $contactNumber) && !empty($contactNumber)){
                $contactNoError = "Invalid Number";
                $docRegValidation = false;
            }

            #CHINECHECK KUNG PAREHAS BA ANG SINULAT NI USER SA PASSWORD AT CONFIRM PASSWORD
            if($confirmPassword != $password && empty($confirmPasswordError)){
                $confirmPasswordError = 'Password does not match.';
                $docRegValidation = false;
            }

            if($docRegValidation){

                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                $userType = 'doctor';

                $role = $_POST['txtDocRole'];
                $service = '';

                if($role == 'gpv'){
                    $service = 'check-up';
                }
                elseif($role == "ims"){
                    $service = 'vaccination';
                }
                elseif($role == "surgeon"){
                    $service = 'surgery';
                }
                elseif($role == "dentist"){
                    $service = 'dentist';
                }
                else{
                    $service = 'grooming';
                }

                $registerAccount = $connection->prepare('INSERT INTO tbl_logininfo (username, userEmail, userPass, userType) VALUES (?, ?, ?, ?)');
                $registerAccount->bind_param('ssss', $username, $email, $hashedPass, $userType);
                $registerAccount->execute();
                $registerAccount->close();

                $loginID = $connection->insert_id;

                $registerAdditionalInfo = $connection->prepare('INSERT INTO tbl_contactinfo (loginID, contactLastName, contactFirstName, contactMiddleInitial, contactNumber, contactAddress, contactType) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $registerAdditionalInfo->bind_param('issssss', $loginID, $lastName, $firstName, $middleInitial, $contactNumber, $address, $userType);
                $registerAdditionalInfo->execute();
                $registerAdditionalInfo->close();

                $contactID = $connection->insert_id;

                $registerDoctor = $connection->prepare('INSERT INTO tbl_doctorinfo (contactID, doctorRole, doctorService) VALUES (?, ?, ?)');
                $registerDoctor->bind_param('iss', $contactID, $role, $service);
                $registerDoctor->execute();
                $registerDoctor->close();

                $registerSuccess = true;
            }
        }

        if(isset($_POST['btnCancel'])){
            header('Location: ../Dashboard.php');
        }
    }
?>

<head>
    <link rel="stylesheet" href="../../css/style_general.css">
    <link rel="stylesheet" href="../../css/dashboard_styles/style_docreg.css">
    <title>DOCTOR REGISTRATION</title>
</head>

<!--SCREEN THAT APPEARS WHEN REGISTRATION IS SUCCESSFUL-->
<div class="information-screen" style="display:<?php if($registerSuccess){echo 'block';}else{echo 'none';}?>">
    <div class="information-header">
        <i class="fas fa-check-circle"></i>
        SUCCESS
    </div>
    <div class="information-desc">
        <p>Doctor has been added.</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <input type="submit" name="btnConfirmAdd" value="Okay">
        </form>
    </div>
</div>

<div class="black-background" style="display:<?php if($registerSuccess){echo 'block';}else{echo 'none';}?>"></div>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="doc-reg-form">
    <div class="container">
        <div class="form-container">
            <div class="input-container">
                <span>
                    <label for="txtLastName">Last Name:</label>
                    <p class="warning">*<?php echo htmlspecialchars($lastNameError);?></p>
                </span>
                <input type="text" name="txtLastName" id="txtLastName" class="input-text" placeholder="Last Name" value="<?php echo htmlspecialchars($_POST['txtLastName']);?>">
            </div>

            <div class="input-container">
                <span>
                    <label for="txtFirstName">First Name:</label>
                    <p class="warning">*<?php echo htmlspecialchars($firstNameError);?></p>
                </span>
                <input type="text" name="txtFirstName" id="txtFirstName" class="input-text" placeholder="First Name" value="<?php echo htmlspecialchars($_POST['txtFirstName']);?>">
            </div>

            <div class="input-container">
                <span>
                    <label for="txtFirstName">Middle Initial:</label>
                </span>
                <input type="text" name="txtMiddleInitial" id="txtMiddleInitial" class="input-text mi" placeholder="Middle Initial" value="<?php echo htmlspecialchars($_POST['txtMiddleInitial']);?>">
            </div>
        </div>

        <div class="form-container">
            <div class="input-container">
                <span>
                    <label for="txtDocRole">Role:</label>
                    <p class="warning">*<?php echo htmlspecialchars($selectRoleError);?></p>
                </span>
                <select name="txtDocRole" id="txtDocRole" class="input-text select">
                    <option value="" disabled selected hidden>Role</option>
                    <option value="gpv">General Practice Vet (GPV)</option>
                    <option value="ims">Internal Medicine Specialist (IMS)</option>
                    <option value="surgeon">Pet Surgeon</option>
                    <option value="dentist">Dentist</option>
                    <option value="pet groomer">Pet Groomer</option>
                </select>
            </div>
        </div>

        <div class="form-container">
            <div class="input-container">
                <span>
                    <label for="txtEmail">Email:</label>
                    <p class="warning">*<?php echo htmlspecialchars($emailError);?></p>
                </span>
                <input type="text" name="txtEmail" id="txtEmail" class="input-text" placeholder="Email" value="<?php echo htmlspecialchars($_POST['txtEmail']);?>">
            </div>

            <div class="input-container">
                <span>
                    <label for="txtContactNo">Contact Number:</label>
                    <p class="warning">*<?php echo htmlspecialchars($contactNoError);?></p>
                </span>
                <input type="tel" name="txtContactNo" id="txtContactNo" class="input-text" pattern="(\+639\d{2}|\d{4})[- ]?\d{3}[- ]?\d{4}" placeholder="Contact Number (09xx xxx xxxx or +639xx xxx xxxx)" value="<?php echo htmlspecialchars($_POST['txtContactNo']);?>">
            </div>
        </div>

        <div class="form-container">
            <div class="input-container">
                <span>
                    <label for="txtUsername">Username:</label>
                    <p class="warning">*<?php echo htmlspecialchars($usernameError);?></p>
                </span>
                <input type="text" name="txtUsername" id="txtUsername" class="input-text" placeholder="Username (Minimum 6 characters)" value="<?php echo htmlspecialchars($_POST['txtUsername']);?>">
            </div>
        </div>

        <div class="form-container">
            <div class="input-container row">
                <div class="input-container">
                    <span>
                        <label for="txtPassword">Password:</label>
                        <p class="warning">*<?php echo htmlspecialchars($passwordError);?></p>
                    </span>
                    <input type="password" name="txtPassword" id="txtPassword" class="input-text" placeholder="Password (Minimum 8 characters)" value="<?php echo htmlspecialchars($_POST['txtPassword']);?>">
                </div>
                
                <button type="button" class="btnShowPass" name="btnShowPass">Show</button>
            </div>

            <div class="input-container row">
                <div class="input-container">
                    <span>
                        <label for="txtConfirmPassword">Confirm Password:</label>
                        <p class="warning">*<?php echo htmlspecialchars($confirmPasswordError);?></p>
                    </span>
                    <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" class="input-text txtPassword" placeholder="Confirm Password" value="<?php echo htmlspecialchars($_POST['txtConfirmPassword']);?>">
                </div>
                
                <button type="button" class="btnShowPass" name="btnShowPass">Show</button>
            </div>
        </div>

        <div class="form-container" style="gap:10px;padding-top:20px;">
            <input type="submit" class="add-doc-btn" name="btnAddDoctor" value="Add Doctor">
            <input type="submit" class="add-doc-btn cancel" name="btnCancel" value="Cancel">
        </div>
    </div>
    
    
    <script>
        //SHOW OR HIDE PASSWORD
        document.querySelectorAll('.btnShowPass').forEach(function(btnShowPass) {
            btnShowPass.addEventListener('click', function(event){
                var passwordField = btnShowPass.previousElementSibling.querySelector('.input-text');
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    btnShowPass.textContent = "Hide";
                } else {
                    passwordField.type = "password";
                    btnShowPass.textContent = "Show";
                }
            });
        });


        //NILILIMIT ANG INPUT SA CONTACT
        document.getElementById('txtContactNo').addEventListener('input', function (e) {
            let value = e.target.value;
            e.target.value = value.replace(/[^0-9+\- ]/g, '');
        });
    </script>
</form>