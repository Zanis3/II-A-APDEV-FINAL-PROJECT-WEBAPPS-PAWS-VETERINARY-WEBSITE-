<?php
    require 'template/config.php';
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <div class="container">
        <div class="floating">
            <h2 class="text-title">LOGIN</h2>
            <hr class="line">
            <br>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <label for="txtUsername">Username: </label>
                <input type="text" name="txtUsername" id="txtUsername" class="input-text" style="margin-bottom:10px;">

                <label for="txtPassword">Password: </label>
                <div class="password-container">
                    <input type="password" name="txtPassword" id="txtPassword" class="input-text txtPassword" style="margin-bottom:20px;">
                    <button type="button" class="btnShow" name="btnShow">Show</button>
                </div>

                <input type="submit" name="btnLogIn" class="btnLogin" value="Login">
            </form>
            <br>
            <p class="text-sub">No Account? Please Register <a href="?showRegisterUI=true">here!</a></p>
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
