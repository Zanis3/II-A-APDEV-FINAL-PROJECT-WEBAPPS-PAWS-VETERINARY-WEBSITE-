<?php
    require '../template/config.php';

    $usernameError = '';
    $passwordError = '';
    $confirmPasswordError = '';

    $registerSuccess = false;

    function emptyError($value){
        if(empty($value)){
            return 'Empty Field';
        }
    }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $confirmPassword = $_POST['txtConfirmPassword'];

        $registerValidation = true;

        $passwordLength = strlen($password);

        if(isset($_POST['btnRegister'])){
            if(empty($username) || empty($password) || empty($confirmPassword)){
                $usernameError = emptyError($username);
                $passwordError = emptyError($password);
                $confirmPasswordError = emptyError($confirmPassword);

                $registerValidation = false;
            }

            $findAccount = $connection->execute_query('SELECT * FROM tbl_logininfo WHERE username = ? LIMIT 1', [$username]);
            $account = $findAccount->fetch_assoc();

            if($account && empty($usernameError)){
                $usernameError = 'Username already in database. Please try again.';
                $registerValidation = false;
            }

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

                $registerAdmin = $connection->prepare('INSERT INTO tbl_logininfo (username, userpassword, usertype) VALUES (?, ?, ?)');
                $registerAdmin->bind_param('sss', $username, $hashedPass, $userType);
                $registerAdmin->execute();
                $registerAdmin->close();

                $registerSuccess = true;
            }

            $findAccount->close();
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

        <div class="information-screen" style="display:<?php if($registerSuccess){echo 'block';}else{echo 'none';}?>">
            <div class="information-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
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
                <div class="form-item">
                    <label for="txtUsername">Username:</label>
                    <input type="text" name="txtUsername" class="input-types" placeholder="Username">
                </div>
                <p class="warning"><?php echo $usernameError;?></p>
                
                <div class="form-item pass">
                    <span>
                        <label for="txtPassword">Password:</label>
                        <input type="password" name="txtPassword" class="input-types txtPassword" placeholder="Password">
                    </span>
                    <button type="button" class="btnShow">Show</button>
                </div>
                <p class="warning"><?php echo $passwordError;?></p>

                <div class="form-item pass">
                    <span>
                        <label for="txtConfirmPassword">Confirm Password:</label>
                        <input type="password" name="txtConfirmPassword" class="input-types txtPassword" placeholder="Confirm Password">
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