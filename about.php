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
        <div class="image-holder">
            <img src="img/about-us-placeholder.jpg" alt="About Us Image">
        </div>
        <div class="about-info">
            <p>Welcome to our veterinary clinic! We are dedicated to providing the best care for your pets. Our team of experienced veterinarians and staff are here to ensure your pets are healthy and happy. We offer a wide range of services including routine check-ups, vaccinations, surgeries, and emergency care. Your pet's well-being is our top priority.</p>
        </div>
    </div>

    <?php include_once 'template/footer.php';?>
</body>
</html>
