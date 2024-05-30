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
            <br>
            <table>
                <tr>
                    <td><label for="txtFirstName">First Name: </label></td>
                    <td><input type="text" name="txtFirstName"></td>
                </tr>
                <tr>
                    <td><label for="txtLastName">Last Name: </label></td>
                    <td><input type="text" name="txtLastName"></td>  
                </tr>
                <tr>
                    <td><label for="txtUsername">Username: </label></td>
                    <td><input type="text" name="txtUsername"></td>
                </tr>
                <tr>
                    <td><label for="txtPassword">Password: </label></td>
                    <td><input type="password" name="txtPassword"></td>
                </tr>
                <tr>
                    <td><label for="txtConfirmPassword">Confirm Password: </label></td>
                    <td><input type="password" name="txtConfirmPassword"></td>
                </tr>
            </table>
            <br>
            <button type="button" name="btnRegister" class="button">Register</button>
            <p>Back to <a href="../II-A-APDEV-FINAL-PROJECT-WEBAPPS-PAWS-VETERINARY-WEBSITE-/login.php">Login</a></p>
        </div>
    </div>
    
</body>