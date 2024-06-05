<?php

    #IF TINATRY I ACCESS ANG SPECIFIC ADDRESS NA ITO, BABALIK SA MENU NILA
    if (basename("dashboard/dash-template/dashboard-docreg.php") == basename($_SERVER["SCRIPT_FILENAME"])){
        if($role == 'admin'){
            header("Location: ../Dashboard.php");
        }
        elseif($role == 'doctor'){
            header("Location: ../dashboard-doc.php");
        }
        else{
            header("Location: ../../index.php");
        }
    }
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="doc-reg-form">
    <table class = "doc-reg-table">
        <tr>
            <td><label for="txtLastName">Last Name:</label></td>
            <td><input type="text" name="txtLastName" id="txtLastName" placeholder = "Last Name" value="<?php echo htmlspecialchars($_POST['txtLastName']);?>"></td>
            <td><p class="warning">*<?php echo $lastNameError;?></p></td>
        </tr>
        <tr>
            <td><label for="txtFirstName">First Name:</label></td>
            <td><input type="text" name="txtFirstName" id="txtFirstName" placeholder = "First Name" value="<?php echo htmlspecialchars($_POST['txtFirstName']);?>"></td>
            <td><p class="warning">*<?php echo $firstNameError;?></p></td>
        </tr>
        <tr>
            <td><label for="txtMiddleInitial">Middle Initial:</label></td>
            <td><input type="text" name="txtMiddleInitial" id="txtMiddleInitial" placeholder = "Middle Initial" value="<?php echo htmlspecialchars($_POST['txtMiddleInitial']);?>"></td>
        </tr>

        <tr>
            <td><label for="txtEmail">Email:</label></td>
            <td><input type="email" name="txtEmail" id="txtEmail" class="input-text" placeholder="Email" value="<?php echo htmlspecialchars($_POST['txtEmail']);?>"></td>
            <td><p class="warning">*<?php echo $emailError;?></p></td>
        </tr>
        <tr>
            <td><label for="txtContactNumber">Contact Number:</label></td>
            <td><input type="tel" name="txtContactNumber" id="txtContactNumber" class="input-text" pattern="(\+639\d{2}|\d{4})[- ]?\d{3}[- ]?\d{4}" placeholder="Contact No. (09XX-XXX-XXXX or +639XX-XXX-XXXX)" maxlength = "14" value="<?php echo htmlspecialchars($_POST['txtContactNumber']);?>"></td>
            <td><p class="warning">*<?php echo $contactNoError;?></p></td>
        </tr>
        <tr>
            <td><label for="txtAddress">Address:</label></td>
            <td><input type="text" name="txtAddress" id="txtAddress" class="input-text" placeholder="Address" value="<?php echo htmlspecialchars($_POST['txtAddress']);?>"></td>
            <td><p class="warning">*<?php echo $addressError;?></p></td>
        </tr>

        <tr>
            <td><label for="txtUsername">Username:</label></td>
            <td><input type="text" name="txtUsername" id="txtUsername" class="input-text" placeholder="Username (Minimum 6 characters)" value="<?php echo htmlspecialchars($_POST['txtUsername']);?>"></td>
            <td><p class="warning">*<?php echo $usernameError;?></p></td>
        </tr>
        <tr>
            <td><label for="txtPassword">Password:</label></td>
            <td><input type="password" name="txtPassword" id="txtPassword" class="input-text txtPassword" placeholder="Password (Minimum 8 characters)"value="<?php echo htmlspecialchars($_POST['txtPassword']);?>"></td>
            <td><p class="warning">*<?php echo $passwordError;?></p></td>
        </tr>
        <tr>
            <td><label for="txtConfirmPassword">Confirm Password:</label></td>
            <td><input type="password" name="txtConfirmPassword" id="txtConfirmPassword" class="input-text txtPassword" placeholder="Confirm Password" value="<?php echo htmlspecialchars($_POST['txtConfirmPassword']);?>"></td>
            <td><p class="warning">*<?php echo $confirmPasswordError;?></p></td>
        </tr>
        <tr>
            <td><input type="submit" name="btnAdd" value="Add"></td>
            <td><input type="submit" name="btnClose" value="Close"></td>
        </tr>
    </table>
</form>