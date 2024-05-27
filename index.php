<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paws Veterinary</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_home.css">
    <script href="script/script.js" deter></script>
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
    
</head>
<body>
    <?php 
        include_once 'template/header.php';
    ?>

    <!--HERO CONTAINER-->
    <div class="hero-container">
        <div class="hero-text">
            <h1 id="hero-title">Welcome to Paws Veterinary Clinic</h1>
            <p id="hero-sub">Providing quality care for your pets.</p>
        </div>
        <div class="hero-img">
            <img src="img/login/dog-login.jpg" alt="">
        </div>
    </div>

    <!--SERVICES CONTAINER-->
    <div class="container">
        <div class="text-container">
            <h2 class="text-title">Our Services</h2>
            <p class="text-sub">Browse our range of veterinary services</p>
        </div>
        <div class="services-items">
            <div class="services-item">
                <div class="serv-item-header one"></div>
                <div class="serv-item-desc">
                    <p class="serv-title">Vaccination Services</p>
                    <p class="serv-desc">Protect your pet from...</p>
                </div>
            </div>
            <div class="services-item">
                <div class="serv-item-header two"></div>
                <div class="serv-item-desc">
                    <p class="serv-title">Surgical Procedures</p>
                    <p class="serv-desc">Providing surgical sol...</p>
                </div>
            </div>
        </div>
    </div>

    <!--ARTICLE CONTAINER-->
    <div class="container sec">
        <div class="text-container">
            <h2 class="text-title">Healthy Pets for a Happy Life</h2>
            <p class="text-sub">Read informative articles on pet care</p>
        </div>
        <div class="article-items">
            <div class="arc-item">
                <div class="arc-image one"></div>
                <div class="arc-desc">
                    <p class="arc-title">Benefits of Regular Check-ups</p>
                    <p class="arc-descr">Regular vet check-ups can help detect health issues early on.</p>
                </div>
            </div>
            <div class="arc-item">
                <div class="arc-image two"></div>
                <div class="arc-desc">
                    <p class="arc-title">Pet Nutrition Tips</p>
                    <p class="arc-descr">Learn about the importance of a balanced diet for your pet's health.</p>
                </div>
            </div>
        </div>
    </div>

    <!--TEAM CONTAINER-->
    <div class="container">
        <div class="text-container">
            <h2 class="text-title">Our Team</h2>
            <p class="text-sub">Meet our experienced veterinarians</p>
        </div>
        <div class="doctor-items">
            <div class="doctor-item">
                <div class="doc-image one"></div>
                <div class="doc-text">
                    <div class="doc-name">
                        <p class="vet-name">Dr. Emily Johnson</p>
                        <p class="vet-title">Veterinarian</p>
                    </div>
                    <p class="doc-desc">10+ Years of Experience</p>
                </div>
            </div>
            <div class="doctor-item">
                <div class="doc-image two"></div>
                <div class="doc-text">
                    <div class="doc-name">
                        <p class="vet-name">Dr. Michael Brown</p>
                        <p class="vet-title">Surgeon</p>
                    </div>
                    <p class="doc-desc">Specializes in complex surgeries</p>
                </div>
            </div>
        </div>
    </div>

    <!--APPOINTMENT CONTAINER-->
    <div class="container apppointment">
        <div class="appointment-image"></div>
        <div class="text-container">
            <h2 class="text-title">Book an Appointment</h2>
            <p class="text-sub">Schedule a visit for your pet!</p>
        </div>
    </div>

    <?php include_once 'template/footer.php';?>
    
</body>
</html>