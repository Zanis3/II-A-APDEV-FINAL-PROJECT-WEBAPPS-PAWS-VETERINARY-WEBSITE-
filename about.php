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

    <?php include_once 'template/footer.php';?>
</body>
</html>
