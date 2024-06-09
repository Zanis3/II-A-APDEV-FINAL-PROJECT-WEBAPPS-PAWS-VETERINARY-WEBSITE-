<?php
    require '../template/config.php';
    $location = 'folder';

    if($isLoggedIn == false){
        header('Location: ../index.php');
    }
?>

<head>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php include_once('../template/header.php');?>
    <div class="content-container">
        <div class="left-container">
            <div class="border">
                <i class="fas fa-user user-icon" style="color: #65A30D"></i>
            </div>
            <h2>Username</h2>
            <button type="submit" name="btnEdit" class="btnEdit"><p><b>Edit Profile</b></p></button>
        </div>
        <br>
        <div class="right-container">
            <hr class="line">
            <table>
                <tr>
                    <td><p><b>Name: </b></p></td>
                    <td></td>
                    <td><p><b>Age: </b></p></td>
                    <td></td>
                </tr>
                <tr>
                    <td><p><b>Email: </b></p></td>
                    <td></td>
                    <td><p><b>Phone Number: </b></p></td>
                    <td></td>
                </tr>
                    <td colspan="2"><p><b> Address: </b></p></td>
                    <td colspan="2"></td>
                <tr>
                    
                </tr>
            </table>
            <hr class="line">
        </div>
    </div>
    <center>
         <h2 style="color: #064E3B;">Appointments</h2>
         <p><b>See all your appointments here!</b></p>
    </center>
    <?php include_once('../template/footer.php');?>
</body>