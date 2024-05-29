<?php
    // Start the session
    session_start();

    // Predefined admin credentials
    $adminUsername = "admin";
    $adminPassword = "password123";

    $loginSuccess = false; // Initialize login success flag

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["txtUsername"];
        $password = $_POST["txtPassword"];

        // Check if the entered credentials match admin's credentials
        if ($username === $adminUsername && $password === $adminPassword) {
            // Credentials are correct, set login success flag
            $loginSuccess = true;
            $_SESSION["isAdmin"] = true; // You can use a session to identify admin login
            header("Location: dashboard/Dashboard.php");
            exit();
        } elseif(empty($username) || empty($password)) {
            echo "<script>alert('Please fill in all required fields.');</script>";
        }
    }
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <center>
        <div class="floating">
            <h1>LOGIN</h1>
            <hr class="line">
            <br>
            <form method="post">
                <table>
                    <tr>
                        <td><label for="txtUsername">Username: </label></td>
                        <td><input type="text" name="txtUsername"></td>
                    </tr>
                    <tr>
                        <td><label for="txtPassword">Password: </label></td>
                        <td><input type="password" name="txtPassword"></td>
                    </tr>
                </table>
                <br>
                <button type="submit" name="btnLogIn" class="button">LogIn</button>
            </form>
            <p>No Account? Please Register <a href="?showRegisterUI=true">here!</a></p>
        </div>
    </center>
</body>
