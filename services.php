<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_services.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php include_once 'template/header.php';?>

    <div class="container title">
        <div class="text-container">
            <h2 class="text-title">Our Veterinary Services</h2>
            <p class="text-sub">Explore a range of services for your beloved pets</p>
        </div>
    </div>

    <div class="container">
        <div class="text-container">
            <h2 class="text-title">Medical Services</h2>
        </div>
        <div class="container-content">
            <div class="item">
                <div class="item-image one"></div>
                <p class="item-desc">Check-ups</p>
            </div>
            <div class="item">
                <div class="item-image two"></div>
                <p class="item-desc">Vaccinations</p>
            </div>
            <div class="item">
                <div class="item-image three"></div>
                <p class="item-desc">Surgery</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-container">
            <h2 class="text-title">Specialty Care</h2>
        </div>
        <div class="container-content">
            <div class="item">
                <div class="item-image four"></div>
                <p class="item-desc">Emergency Care</p>
            </div>
            <div class="item">
                <div class="item-image five"></div>
                <p class="item-desc">Neurology</p>
            </div>
            <div class="item">
                <div class="item-image six"></div>
                <p class="item-desc">Pharmacy</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-container">
            <h2 class="text-title">Grooming & Wellness</h2>
        </div>
        <div class="container-content">
            <div class="item">
                <div class="item-image seven"></div>
                <p class="item-desc">Grooming</p>
            </div>
            <div class="item">
                <div class="item-image eight"></div>
                <p class="item-desc">Bathing</p>
            </div>
            <div class="item">
                <div class="item-image nine"></div>
                <p class="item-desc">Pet Training</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-container">
            <h2 class="text-title">Book an Appointment</h2>
            <p class="text-sub">Fill up the form below to schedule a visit</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <input type="text" name="txtPetName" id="">
            </form>
        </div>
    </div>

    <?php include_once 'template/footer.php';?>
</body>
</html>