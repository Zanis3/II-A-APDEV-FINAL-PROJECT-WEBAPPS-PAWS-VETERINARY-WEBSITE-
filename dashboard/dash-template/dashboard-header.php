<?php
session_start();

#IF TINATRY I ACCESS ANG SPECIFIC ADDRESS NA ITO, BABALIK SA MENU NILA
if (basename("dashboard/dash-template/dashboard-header.php") == basename($_SERVER["SCRIPT_FILENAME"])) {
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

$docSelected = false;
$repSelected = false;
$calSelected = false;
$userSelected = false;
$_SESSION['docReg'] = '';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['btnUsers'])){ 
        $userSelected = true;
    }

    if(isset($_POST['btnDoctors'])){
        $docSelected = true;
        $docReg = false;
    }

    if(isset($_POST['btnReports'])){
        $repSelected = true;
    }

    if(isset($_POST['btnCalendar'])){
        $calSelected = true;
    }

    if(isset($_POST['btnAddDoc'])){
        header("Location: dash-template/dashboard-docreg.php");
    }

    if(isset($_POST['deleteUser'])) {
        $userIdToDelete = $_POST['userId'];
        $deleteUserStmt = $connection->prepare('DELETE FROM tbl_logininfo WHERE loginID = ?');
        $deleteUserStmt->bind_param('i', $userIdToDelete);
        $deleteUserStmt->execute();
        $deleteUserStmt->close();
    }

    if(isset($_POST['deleteDoctor'])) {
        $doctorIdToDelete = $_POST['doctorId'];

        
        $deleteDoctorStmt = $connection->prepare('DELETE FROM tbl_doctorinfo WHERE doctorID = ?');
        $deleteDoctorStmt->bind_param('i', $doctorIdToDelete);
        $deleteDoctorStmt->execute();
        $deleteDoctorStmt->close();

        // Delete from tbl_contactinfo
        $deleteDoctorContactStmt = $connection->prepare('DELETE FROM tbl_contactinfo WHERE contactID = ?');
        $deleteDoctorContactStmt->bind_param('i', $doctorIdToDelete);
        $deleteDoctorContactStmt->execute();
        $deleteDoctorContactStmt->close();

        // Delete from tbl_logininfo
        $deleteDoctorLoginStmt = $connection->prepare('DELETE FROM tbl_logininfo WHERE loginID = ?');
        $deleteDoctorLoginStmt->bind_param('i', $doctorIdToDelete);
        $deleteDoctorLoginStmt->execute();
        $deleteDoctorLoginStmt->close();
    }
}
?>

<div class="right-nav">
    <div class="header">
        <table>
            <tr>
                <td><h2 style="margin-top: 0; margin-bottom: 0; padding-right: 60%;">Dashboard</h2></td>
                <td>
                    <div>
                        <img src="../img/gen/web-logo.png" class="web-logo">
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="navigation">
        <table>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="navbar-form">
                <tr>
                    <td><input type="submit" class="nav-btns" name="btnUsers" value="Users"></td>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="nav-btns" name="btnDoctors" value="Doctors"></td>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="nav-btns" name="btnReports" value="Reports"></td>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="nav-btns" name="btnCalendar" value="Calendar"></td>
                </tr>
            </form>
        </table>
    </div>
    <div class="content" id="content">
        <?php if($userSelected): ?>
            <div class="users-container">
                <h2 style = "text-align: center">Users Management</h2>
                <table class="user-table">
                    <tr>
                        <th>Login ID</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $findUsers = $connection->prepare('SELECT loginID, username FROM tbl_logininfo');
                    $findUsers->execute();
                    $result = $findUsers->get_result();
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                            <td>'.$row['loginID'].'</td>
                            <td>'.$row['username'].'</td>
                            <td>
                                <form method="post" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'">
                                    <input type="hidden" name="userId" value="'.$row['loginID'].'">
                                    <input type="submit" name="deleteUser" value="Delete" onclick="return confirm(\'Are you sure you want to delete this user?\')">
                                </form>
                            </td>
                        </tr>';
                    }
                    $findUsers->close();
                    ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="content" id="content">
       <?php if($docSelected): ?>
    <table class="doctor-table">
        <?php
            $findDoctorRole = $connection->prepare('SELECT * FROM tbl_doctorinfo');
            $findDoctorRole->execute();
            $foundDoctorRole = $findDoctorRole->get_result();
            $findDoctorRole->close();

            $findDoctorName = $connection->prepare('SELECT * FROM tbl_contactinfo WHERE contactType = ?');
            $userType = 'doctor';
            $findDoctorName->bind_param('s', $userType);
            $findDoctorName->execute();
            $foundDoctorName = $findDoctorName->get_result();
            $findDoctorName->close();

            if($foundDoctorRole->num_rows > 0){
                echo '<tr>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Action</th>
                      </tr>';

                while(($row = $foundDoctorRole->fetch_assoc()) && ($row2 = $foundDoctorName->fetch_assoc())){
                    echo '<tr>
                    <td>'.$row2['contactLastName'].', '.$row2['contactFirstName'].'</td>
                    <td>'.$row['doctorRole'].'</td>
                    <td>
                        <form method="post" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'">
                            <input type="hidden" name="doctorId" value="'.$row['doctorID'].'">
                            <input type="submit" name="deleteDoctor" value="Delete" onclick="return confirm(\'Are you sure you want to delete this doctor?\')">
                        </form>
                    </td>
                    </tr>';
                }
            }
            else{
                echo '<tr><td style="border:none;display:flex;align-items:center;justify-content:center;">No doctors found.</td></tr>';
            }
        ?>
        <tr>
            <td style="border:none;display:flex;align-items:center;justify-content:center;">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <input type="submit" class="nav-content-btn" name="btnAddDoc" value="Add a Doctor">
                </form>
            </td>
        </tr>
    </table>
<?php endif; ?>
    </div>
    <div class="content" id="content">
        <?php if($calSelected): ?>
            <div class="calendar-container">
                <div class="calendar-header">
                    <select id="month-select">
                    </select>
                    <span id="year-display"></span>
                </div>
                <div class="calendar-body">
                    <div class="calendar-days">
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar-dates">
                        <!-- JavaScript will populate this with the dates -->
                    </div>
                </div>
                <div id="disable-container" style="text-align: center;">
                    <button id="disable-button" class="btnDissable" onclick="confirmDisable()">Disable</button>
                </div>
                <div id="disabled-dates-container" style="margin-top: 20px; margin-left: 6%;">
                    <p><b>Disabled Dates:</b></p>   
                </div>
            </div>
            <script src="../script/calendar.js"></script>
        <?php endif; ?>
    </div>
</div>
