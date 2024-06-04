<?php
    require '../template/config.php';

    $userNameError = '';
    $passwordError = '';

    function emptyError($value){
        if(empty($value)){
            return 'Empty Field';
        }
    }

    #REDIRECT SA HOME PAGE PAG LOGGED IN NA
    if($isLoggedIn){
        header('Location: ../index.php');
    }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $remember = $_POST['chkRemember'];

        $loginValidation = true;

        if(isset($_POST['btnLogIn'])){

            #EMPTY FIELD ERRORS
            if(empty($username) || empty($password)){
                $userNameError = emptyError($username);
                $passwordError = emptyError($password);

                $loginValidation = false;
            }

            #USERNAME FINDER SA DB
            $findAccount = $connection->execute_query('SELECT * FROM tbl_logininfo WHERE username = ? LIMIT 1', [$username]);

            $account = $findAccount->fetch_assoc();

            if(!$account && empty($userNameError)){
                $userNameError = 'Username not found. Please try again.';
                
                $loginValidation = false;
            }

            #COMPARE USERNAME AND PASSWORD
            if(!password_verify($password, $account['userpassword']) && empty($passwordError)){
                $passwordError = 'Password does not match username.';

                $loginValidation = false;
            }

            #LOGIN VALIDATION
            if($loginValidation){
                $_SESSION['login'] = true;
                $_SESSION['username'] = $username;

                #REMEMBER ACCOUNT KAHIT I EXIT ANG BROWSER (15 DAYS)
                if($remember == 'Remember' && $account['usertype'] == 'user'){
                    setcookie('isLoggedIn', $_SESSION['login'], time() + (86400 * 15), '/');
                    setcookie('username', $_SESSION['username'], time() + (86400 * 15), '/');
                }

                #REDIRECT ACCOUNT TO THEIR ROLE
                if($account['usertype'] == 'user'){
                    header('Location: ../index.php');
                }
                elseif($account['usertype'] == 'doctor'){
                    header('Location: ../dashboard/dashboard_doc.php');
                }
                else{
                    header('Location: ../dashboard/Dashboard.php');
                }
            }
        }
    }
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_login.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <title>LOGIN</title>
</head>

<body>
    <div class="container">
        <div class="floating">
            <h2 class="text-title">LOGIN</h2>
            <hr class="line">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                
                <!--USERNAME CONTAINER-->
                <label for="txtUsername" class="login-label">Username: </label>
                <input type="text" name="txtUsername" id="txtUsername" class="input-text" placeholder="Username" value="<?php echo $_POST['txtUsername'];?>">
                <p class="warning" style="width:100%; margin-top:0;"><?php echo htmlspecialchars($userNameError); ?></p>

                <!--PASSWORD CONTAINER-->
                <label for="txtPassword" class="login-label">Password: </label>
                <div class="password-container">
                    <input type="password" name="txtPassword" id="txtPassword" class="input-text txtPassword" placeholder="Password" value="<?php echo $_POST['txtPassword'];?>">
                    <button type="button" class="btnShow login" name="btnShow">Show</button>
                </div>
                <p class="warning" style="width:100%; margin-top:0;"><?php echo htmlspecialchars($passwordError); ?></p>

                <!--REMEMBER CONTAINER-->
                <div class="remember-me-container">
                    <input type="checkbox" name="chkRemember" id="chkRemember" value="Remember">
                    <label for="chkRemember">Remember me</label>
                </div>

                <input type="submit" name="btnLogIn" class="btnLogin" value="Login">
            </form>
            <p class="text-sub">No Account? Please Register <a href="register.php">here!</a></p>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btnShow').forEach(function(btnShow) {
            btnShow.addEventListener('click', function(event){
                var passwordField = document.getElementById('txtPassword');
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