<?php
    require '../template/config.php';

    $location="folder";

    if ($isLoggedIn == false) {
        header('Location: ../index.php');
        exit();
    }

    $username = $_SESSION['username'];

    // Fetch user information from the database
    $query = "SELECT l.userEmail, l.userPass, c.contactLastName, c.contactFirstName, c.contactMiddleInitial, c.contactNumber, c.contactAddress 
              FROM tbl_logininfo l
              JOIN tbl_contactinfo c ON l.loginID = c.loginID 
              WHERE l.username = ?";
    $stmt = $connection->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "User not found.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>User Settings</title>
</head>
<body>
    <?php include_once('../template/header.php');?>

    <div class="settings-container" style="margin-bottom:30px;">
        <h2>User Settings</h2>
        <form action="update_user_settings.php" method="POST">
            <div class="form-group">
                <label for="last_name">Change Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['contactLastName']); ?>" required>
            </div>
            <div class="form-group">
                <label for="first_name">Change First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['contactFirstName']); ?>" required>
            </div>
            <div class="form-group">
                <label for="middle_initial">Change Middle Initial (Optional):</label>
                <input type="text" id="middle_initial" name="middle_initial" value="<?php echo htmlspecialchars($user['contactMiddleInitial']); ?>">
            </div>
            <div class="form-group">
                <label for="email">Change Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['userEmail']); ?>" required>
            </div>
            <div class="form-group">
                <label for="contact_no">Change Contact No.:</label>
                <input type="text" id="contact_no" name="contact_no" value="<?php echo htmlspecialchars($user['contactNumber']); ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Change Address:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['contactAddress']); ?>" required>
            </div>
            <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Change Password:</label>
                <input type="password" id="new_password" name="new_password">
            </div>
            <div class="form-buttons">
                <button type="submit" name="update">Update</button>
                <button type="button" onclick="window.location.href='user_dashboard.php'">Cancel</button>
            </div>
        </form>
    </div>

    <?php include_once('../template/footer.php');?>
</body>
</html>
