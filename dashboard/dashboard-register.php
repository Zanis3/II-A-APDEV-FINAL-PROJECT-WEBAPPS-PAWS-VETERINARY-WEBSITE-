<?php
    require '../template/config.php';

    $usernameError = '';
    $emailError = '';
    $passwordError = '';
    $confirmPasswordError = '';

    $registerSuccess = false;

    function emptyError($value){
        if(empty($value)){
            return 'Empty Field';
        }
    }

    #REDIRECT SA HOME PAGE PAG LOGGED IN NA
    if($isLoggedIn){
        if($role == 'user'){
            header('Location: ../index.php');
        }
        elseif($role == 'doctor'){
            header('Location: dashboard-doc.php');
        }
        else{
            header('Location: Dashboard.php');
        }
    }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $username = $_POST['txtUsername'];
        $email = $_POST['txtEmail'];
        $password = $_POST['txtPassword'];
        $confirmPassword = $_POST['txtConfirmPassword'];

        $registerValidation = true;

        $passwordLength = strlen($password);

        if(isset($_POST['btnRegister'])){
            if(empty($username) || empty($email) || empty($password) || empty($confirmPassword)){
                $usernameError = emptyError($username);
                $emailError = emptyError($email);
                $passwordError = emptyError($password);
                $confirmPasswordError = emptyError($confirmPassword);

                $registerValidation = false;
            }

            $findUsername = $connection->execute_query('SELECT * FROM tbl_logininfo WHERE username = ? LIMIT 1', [$username]);
            $userNameQuery = $findUsername->fetch_assoc();

            $findEmail = $connection->execute_query('SELECT * FROM tbl_logininfo WHERE userEmail = ? LIMIT 1', [$email]);
            $emailQuery = $findEmail->fetch_assoc();

            if($userNameQuery && empty($usernameError)){
                $usernameError = 'Username already in database. Please try again.';
                $registerValidation = false;
            }

            if($emailQuery && empty($emailError)){
                $emailError = 'Email already in database. Please try again.';
                $registerValidation = false;
            }

            $findUsername->close();
            $findEmail->close();

            if($passwordLength < 8){
                $passwordError = 'Password should be eight characters or more.';
                $registerValidation = false;
            }

            if($password != $confirmPassword && empty($confirmPasswordError)){
                $confirmPasswordError = 'Password does not match this field. Please try again.';
                $registerValidation = false;
            }

            if($registerValidation){
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                $userType = 'admin';

                $registerAdmin = $connection->prepare('INSERT INTO tbl_logininfo (username, userEmail, userPass, userType) VALUES (?, ?, ?, ?)');
                $registerAdmin->bind_param('ssss', $username, $email, $hashedPass, $userType);
                $registerAdmin->execute();
                $registerAdmin->close();

                $registerSuccess = true;
            }
        } 
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/dashboard_styles/style_adminreg.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <title>ADMIN REGISTRATION</title>
</head>
<body>
    <div class="container">

        <!--INFORMATION SCREEN-->
        <div class="information-screen" style="display:<?php if($registerSuccess){echo 'block';}else{echo 'none';}?>">
            <div class="information-header">
                <i class="fas fa-check-circle"></i>
                SUCCESS
            </div>
            <p class="information-desc">Your registration has been successful. Please return to the <a href="../login/login.php">login screen.</a></p>
        </div>

        <div class="black-background" style="display:<?php if($registerSuccess){echo 'block';}else{echo 'none';}?>"></div>

        <div class="form-container">
            <div class="title-container">
                <h2 class="text-title">REGISTER ADMIN</h2>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                
                <!--USERNAME-->
                <div class="form-item">
                    <label for="txtUsername">Username:</label>
                    <input type="text" name="txtUsername" class="input-types" placeholder="Username" value="<?php echo htmlspecialchars($_POST['txtUsername']);?>">
                </div>
                <p class="warning"><?php echo $usernameError;?></p>

                <!--EMAIL-->
                <div class="form-item">
                    <label for="txtEmail">Email:</label>
                    <input type="text" name="txtEmail" class="input-types" placeholder="Email" value="<?php echo htmlspecialchars($_POST['txtEmail']);?>">
                </div>
                <p class="warning"><?php echo $emailError;?></p>
                
                <!--PASSWORD-->
                <div class="form-item pass">
                    <span>
                        <label for="txtPassword">Password:</label>
                        <input type="password" name="txtPassword" class="input-types txtPassword" placeholder="Password" value="<?php echo htmlspecialchars($_POST['txtPassword']);?>">
                    </span>
                    <button type="button" class="btnShow">Show</button>
                </div>
                <p class="warning"><?php echo $passwordError;?></p>

                <!--CONFIRM PASSWORD-->
                <div class="form-item pass">
                    <span>
                        <label for="txtConfirmPassword">Confirm Password:</label>
                        <input type="password" name="txtConfirmPassword" class="input-types txtPassword" placeholder="Confirm Password" value="<?php echo htmlspecialchars($_POST['txtConfirmPassword']);?>">
                    </span>
                    <button type="button" class="btnShow">Show</button>
                </div>
                <p class="warning"><?php echo $confirmPasswordError;?></p>

                <input type="submit" value="Register" name="btnRegister" id="btnRegister">
                
            </form>
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
    </script>
</body>