<?php
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <center>
        <div class="floating">
            <h1>REGISTER</h1>
            <hr class="line">
            <br>
            <table>
                <tr>
                    <td><label for="txtFirstName">Firstname: </label></td>
                    <td><input type="text" name="txtFirstName"></td>
                </tr>
                <tr>
                    <td><label for="txtLastName">Lastname: </label></td>
                    <td><input type="text" name="txtLastName"></td>  
                </tr>
                <tr>
                    <td><label for="txtUsername">Username: </label></td>
                    <td><input type="text" name="txtUsername"></td>
                </tr>
                <tr>
                    <td><label for="txtPassword">Password: </label></td>
                    <td><input type="text" name="txtPassword"></td>
                </tr>
            </table>
            <br>
            <button type="button" name="btnRegister" class="button">Register</button>
        </div>
    </center>
</body>