<?php
    require 'template/config.php';

    $adminUsername = "admin";
    $adminPassword = "password123";

    $loginSuccess = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["txtUsername"];
        $password = $_POST["txtPassword"];

        if($username === $adminUsername && $password === $adminPassword){
            $loginSuccess = true;
            $_SESSION["isAdmin"] = true;
            header("Location: dashboard/Dashboard.php");
            exit();
        } 
        elseif(empty($username) || empty($password)) {
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
    <div class="container">
        <div class="floating">
            <h2 class="text-title">LOGIN</h2>
            <hr class="line">
            <br>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <table>
                    <tr>
                        <td><label for="txtUsername">Username: </label></td>
                        <td><input type="text" name="txtUsername" id="txtUsername"></td>
                    </tr>
                    <tr>
                        <td><label for="txtPassword">Password: </label></td>
                        <td><input type="password" name="txtPassword" id="txtPassword"></td>
                    </tr>
                </table>
                <br>
                <button type="submit" name="btnLogIn" class="button">Login</button>
            </form>
            <p>No Account? Please Register <a href="?showRegisterUI=true">here!</a></p>
        </div>
    </div>
</body>
