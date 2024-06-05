<?php
    require 'template/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
</head>
<body>
    <?php include_once 'template/header.php';?>

    <div class="about-container">
        <h1>About Us</h1>
        <hr class="line">
        <br>
        <div class="about-content">
            <div class="about-info">
                <p>Welcome to PAWS Veterinary Clinic! We are dedicated to providing the best care for your pets. Our team of experienced veterinarians and staff are here to ensure your pets are healthy and happy. We offer a wide range of services including routine check-ups, vaccinations, surgeries, and emergency care. Your pet's well-being is our top priority.</p>
                <p>Our clinic is equipped with state-of-the-art facilities and the latest medical technology to ensure that your pets receive the highest standard of care. From preventive health care to advanced surgical procedures, we are committed to meeting all of your pet's health needs.</p>
            </div>
            <div class="image-collage">
                <div class="image-holder">
                    <img src="img/about us/image1.jpg" alt="About Us Image 1"> 
                </div>
                <div class="image-holder">
                    <img src="img/about us/vetclinicsurgeryroom.jpg" alt="About Us Image 2">
                </div>
                <div class="image-holder">
                    <img src="img/about us/Vet_clinic.jpg" alt="About Us Image 3">
                </div>
                <div class="image-holder">
                    <img src="img/about us/facility.jpg" alt="About Us Image 4">
                </div>
            </div>
        </div>
        <div class="quote-section">
            <blockquote>
                "The greatness of a nation and its moral progress can be judged by the way its animals are treated." - Mahatma Gandhi
            </blockquote>
        </div>
    </div>
    <br>
    <div class="review-container">
        <center>
            <h2 style="color: #064E3B">Reviews</h2>
            <p><b>Our satisfied clients!</b></p>
        </center>
        <center>
            <div class="feedback-slide active">
                <center>
                    <div class="circle">
                        <i class="fas fa-user" style="font-size: 25px"></i>
                    </div>
                </center>
                <br>
                <h3 style="margin-top: 0; margin-bottom: 0;">Jestin Clark V. Sacayle</h3>
                <p style="color: #65A30D; margin-top: 0;"><b>Fur Parent</b></p>
                <p style="margin-left: 5%; margin-right: 5%;">
                    Paws Vet Clinic is amazing! The staff are 
                    friendly and knowledgeable, and they provide 
                    top-notch care for my pets. The clinic is 
                    clean and modern, and I love the convenience 
                    of their appointment scheduling. 
                    I highly recommend them!
                </p>
            </div>
            <div class="feedback-slide">
                <center>
                    <div class="circle">
                        <i class="fas fa-user" style="font-size: 25px"></i>
                    </div>
                </center>
                <br>
                <h3 style="margin-top: 0; margin-bottom: 0;">Euvert Zion Pagad</h3>
                <p style="color: #65A30D; margin-top: 0;"><b>Fur Parent</b></p>
                <p style="margin-left: 5%; margin-right: 5%;">
                    Paws Vet Clinic exceeded my expectations. 
                    The staff was warm, knowledgeable, 
                    and truly cared for my pet. Highly recommend!
                </p>
            </div>
            <div class="feedback-slide">
                <center>
                    <div class="circle">
                        <i class="fas fa-user" style="font-size: 25px"></i>
                    </div>
                </center>
                <br>
                <h3 style="margin-top: 0; margin-bottom: 0;">Keannu Manabilang</h3>
                <p style="color: #65A30D; margin-top: 0;"><b>Fur Parent</b></p>
                <p style="margin-left: 5%; margin-right: 5%;">
                    Paws Vet Clinic provided top-notch care for my pet. 
                    The staff was friendly and knowledgeable, 
                    and I left feeling reassured about my pet's 
                    health. Highly recommend their services!
                </p>
            </div>
            <div class="feedback-slide">
                <center>
                    <div class="circle">
                        <i class="fas fa-user" style="font-size: 25px"></i>
                    </div>
                </center>
                <br>
                <h3 style="margin-top: 0; margin-bottom: 0;">Ijay Jaculbe</h3>
                <p style="color: #65A30D; margin-top: 0;"><b>Fur Parent</b></p>
                <p style="margin-left: 5%; margin-right: 5%;">
                    My experience at Paws Vet Clinic was exceptional. 
                    The staff was attentive, the facilities were clean, 
                    and the veterinarians were knowledgeable and 
                    compassionate. I trust them completely with my pet's care.
                </p>
            </div>
            <div class="feedback-slide">
                <center>
                    <div class="circle">
                        <i class="fas fa-user" style="font-size: 25px"></i>
                    </div>
                </center>
                <br>
                <h3 style="margin-top: 0; margin-bottom: 0;">Alvin Villanueva</h3>
                <p style="color: #65A30D; margin-top: 0;"><b>Fur Parent</b></p>
                <p style="margin-left: 5%; margin-right: 5%;">
                    Paws Vet Clinic sets the standard for exceptional 
                    pet care. From the warm welcome at the door to 
                    the expert attention from the veterinarians, 
                    every aspect of my visit was outstanding. 
                    I wouldn't trust anyone else with my furry family member.
                </p>
            </div>
        </center>
        <div class="number-indicators">
            <span class="number active" data-index="1">1</span>
            <span class="number" data-index="2">2</span>
            <span class="number" data-index="3">3</span>
            <span class="number" data-index="4">4</span>
            <span class="number" data-index="5">5</span>
        </div>
    </div>
    <script src="script/feedback.js"></script>

    <?php include_once 'template/footer.php';?>
</body>
</html>
