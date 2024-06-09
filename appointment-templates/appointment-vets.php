<?php
    require '../template/config.php';

    $location = 'folder';
    if (isset($_POST['back']) || $_SESSION['selectedService'] == ''){
        header('Location: ../appointments.php');
        exit();
    }

    if (isset($_GET['vet'])){
        $selectedVetID = $_GET['vet'];
        $_SESSION['selectedVetID'] = $selectedVetID;
        header("Location: schedule.php");
        exit();
    }

    $getDoctorInfo = $connection->prepare('SELECT contactID FROM tbl_doctorinfo WHERE doctorService = ?');
    $getDoctorInfo->bind_param('s', $_SESSION['selectedService']);
    $getDoctorInfo->execute();
    $result = $getDoctorInfo->get_result();

    $doctorID = $connection->insert_id;

    $contactIDs = [];
    while ($row = $result->fetch_assoc()) {
        $contactIDs[] = $row['contactID'];
    }

    if(!empty($contactIDs)){
        $placeholders = implode(',', array_fill(0, count($contactIDs), '?'));
        $getUserInfo = $connection->prepare('SELECT * FROM tbl_contactinfo WHERE contactID IN (' . $placeholders . ')');
        $types = str_repeat('i', count($contactIDs));
        $getUserInfo->bind_param($types, ...$contactIDs);
        $getUserInfo->execute();
        $result = $getUserInfo->get_result();
    }
?>
<head>
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <title>Select Doctor</title>
</head>
<body>
    <?php include_once '../template/header.php';?>
    <br>
    <div class="content" style="height:685px;">
        <div class="center" style="display:flex; align-items:center; flex-direction:column;">
            <h1><?php echo htmlspecialchars(ucfirst($_SESSION['selectedService']));?></h1>
            <p><b> Please choose your preferred vet:</b></p>
            <br>
        </div>
        <div class="center">
            <?php while($user = $result->fetch_assoc()): ?>
                <div class="container">
                    <a href="?vet=<?php echo $doctorID;?>" class="container-link"><b>Dr. <?php echo $user['contactFirstName'] . ' ' . $user['contactLastName'];?></b><i class="fas fa-arrow-right"></i></a>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="button-container">
            <form method="post">
                <button type="submit" name="back" class="btnAppointment" style="cursor:pointer"><b>Go Back</b></button>
            </form>
        </div>
    </div>
    <?php include_once '../template/footer.php';?>
</body>
