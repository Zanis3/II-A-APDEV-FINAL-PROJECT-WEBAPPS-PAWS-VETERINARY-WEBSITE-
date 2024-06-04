<?php
    require 'template/config.php';
    if(isset($_POST['set'])){
        header('Location: appointments.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_services.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
</head>
<body>
    <?php include_once 'template/header.php';?>

    <div class="main-container">
        <div class="text-container">
            <h1 class="text-title">Our Veterinary Services</h1>
            <p class="text-sub">Explore a range of services for your beloved pets</p>
        </div>
    </div>
    <div class="container">
        <div class="text-container">
            <h1 style="color: #064E3B;">Medical Services</h1>
            <hr class="line">
        </div>
        <div class="grid-container">
            <div class="grid-item" id="service1">
                <div class="image-container">
                    <img src="img/services/checkup.png" alt="CheckUp">
                </div>
                <div class="description-container">
                    <hr class="line">
                    <h3>Check-Up</h3>
                </div>
            </div>
            <div class="grid-item" id="service2">
                <div class="image-container">
                    <img src="img/services/consultation.png" alt="Consultation">
                </div>
                <div class="description-container">
                    <hr class="line">
                    <h3>Consultation</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="floating-ui" id="floatingUI1">
        <h2 style="color: #064E3B">Check Up Details</h2>
        <hr class="line">
        <br>
        <p style="margin-left: 5%; margin-right: 5%;">
            Expert check-ups for your pet's health 
            and happiness. Trust us for thorough 
            care tailored to their needs
        </p>
        <p><b>Duration:</b> 30 mins - 1 hr </p>
        <form method="post">
            <button type="submit" class="set" name="set"><b>Set Appointment</b></button>
        </form>
    </div>
    <div class="floating-ui" id="floatingUI2">
        <h2 style="color: #064E3B">Consultation Details</h2>
        <hr class="line">
        <br>
        <p style="margin-left: 5%; margin-right: 5%;">
            Personalized consultations provide 
            tailored guidance for your pet's well-being. 
            Our experts offer trusted advice 
            and peace of mind for every pet owner
        </p>
        <p><b>Duration:</b> 30 mins - 1 hr </p>
        <form method="post">
            <button type="submit" class="set" name="set"><b>Set Appointment</b></button>
        </form>
    </div>
    <br>
    <div class="container">
        <div class="text-container">
            <h1 style="color: #064E3B;">Specialty Service</h1>
            <hr class="line">
        </div>
        <div class="grid-container">
            <div class="grid-item" id="service3">
                <div class="image-container">
                    <img src="img/services/surgery.png" alt="Surgery">
                </div>
                <div class="description-container">
                    <hr class="line">
                    <h3>Surgery</h3>
                </div>
            </div>
            <div class="grid-item" id="service4">
                <div class="image-container">
                    <img src="img/services/dental.png" alt="Dental">
                </div>
                <div class="description-container">
                    <hr class="line">
                    <h3>Dental</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="floating-ui" id="floatingUI3">
        <h2 style="color: #064E3B">Surgery Details</h2>
        <hr class="line">
        <br>
        <p style="margin-left: 5%; margin-right: 5%;">
            Surgical excellence for your pet's health. 
            From routine procedures to advanced 
            surgeries, trust our skilled team for 
            compassionate care and successful outcomes.
        </p>
        <p><b>Duration:</b> 30 mins - 1 hr+ </p>
        <form method="post">
            <button type="submit" class="set" name="set"><b>Set Appointment</b></button>
        </form>
    </div>
    <div class="floating-ui" id="floatingUI4">
        <h2 style="color: #064E3B">Dental Details</h2>
        <hr class="line">
        <br>
        <p style="margin-left: 5%; margin-right: 5%;">
            Revitalize Your Pet's Smile: Our dental 
            care offers cleanings, extractions, 
            and expert oral health services for 
            their comfort and well-being.
        </p>
        <p><b>Duration:</b> 30 mins - 1 hr+ </p>
        <form method="post">
            <button type="submit" class="set" name="set"><b>Set Appointment</b></button>
        </form>
    </div>

    <br>
    <div class="container">
        <div class="text-container">
            <h1 style="color: #064E3B;">Wellness Service</h1>
            <hr class="line">
        </div>
        <div class="grid-container">
            <div class="grid-item" id="service5">
                <div class="image-container">
                    <img src="img/services/Grooming.png" alt="Grooming">
                </div>
                <div class="description-container">
                    <hr class="line">
                    <h3>Grooming</h3>
                </div>
            </div>
            <div class="grid-item" id="service6">
                <div class="image-container">
                    <img src="img/services/vaccination.png" alt="Vaccination">
                </div>
                <div class="description-container">
                    <hr class="line">
                    <h3>Vaccination</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="floating-ui" id="floatingUI5">
        <h2 style="color: #064E3B">Grooming Details</h2>
        <hr class="line">
        <br>
        <p style="margin-left: 5%; margin-right: 5%;">
            Transform Your Pet's Look: Our grooming 
            services include bathing, haircuts, nail 
            trims, and more, to keep your pet 
            looking and feeling their best.
        </p>
        <p><b>Duration:</b> 30 mins - 1 hr+ </p>
        <form method="post">
            <button type="submit" class="set" name="set"><b>Set Appointment</b></button>
        </form>
    </div>
    <div class="floating-ui" id="floatingUI6">
        <h2 style="color: #064E3B">Grooming Details</h2>
        <hr class="line">
        <br>
        <p style="margin-left: 5%; margin-right: 5%;">
            Protect Your Pet: Our vaccination 
            services provide essential immunizations 
            to safeguard your furry friend 
            against common diseases, ensuring a 
            happy and healthy life.
        </p>
        <p><b>Duration:</b> 30 mins - 1 hr </p>
        <form method="post">
            <button type="submit" class="set" name="set"><b>Set Appointment</b></button>
        </form>
    </div>

    <script src="script/floating.js"></script>
    <br>
    <br>
    <?php include_once 'template/footer.php';?>
</body>
</html>