<?php
    require 'template/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paws Veterinary</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style_general.css">
    <link rel="stylesheet" href="css/style_home.css">
    <link rel="shortcut icon" href="img/gen/web-logo.png" type="image/png">
</head>
<body>
    <?php 
        include_once 'template/header.php';

        $nameError = '';
        $dateError = '';
        $timeError = '';
        $radioError = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['btnAppointmentHome'])){
                $petName = $_POST['txtPetName'];
                $indexTime = $_POST['txtTimeOfAppointment'];
                $indexDate = $_POST['txtDateOfAppointment'];

                if(empty($petName) || !isset($_POST['rdoPetType']) || empty($indexDate) || empty($indexTime)){
                    if(empty($petName)){
                        $nameError = "Please input your pet's name and try again.";
                    }

                    if(empty($indexDate)){
                        $dateError = "Please input the date of your appointment and try again.";
                    }

                    if(empty($indexTime)){
                        $timeError = "Please input the time of your appointment and try again.";
                    }

                    if(!isset($_POST['rdoPetType'])){
                        $radioError = "Please select the type of your pet and try again.";
                    }
                }
                else{
                    $_SESSION['petName'] = $petName;
                    $_SESSION['petType'] = $_POST['rdoPetType'];
                    $_SESSION['date'] = $indexDate;
                    $_SESSION['time'] = $indexTime;
                    header('Location: appointments.php');
                }
            }
        }
    ?>

    <!--HERO CONTAINER-->
    <div class="hero-container">
        <div class="hero-text">
            <p id="hero-sub">Opening Hours:</p>
            <h1 id="hero-title">Mon - Sat : 9 am - 5 pm </h1>
            <hr class="line">
            <p id="hero-moto">GIVING QUALITY CARE FOR YOUR PETS!</p>
        </div>
        <div class="hero-img">
            <img src="img/login/dog.png">
        </div>
    </div>

    <!--SERVICES CONTAINER-->
    <br>
    <br>
    <center>
         <h2>Welcome to Paws Vet Clinic</h2>
         <p><b>Caring for your pet's health is our foremost priority.</b></p>
    </center>
    <div class="container">
        <div class="icon-container left">
            <div class="icon">
                <table>
                    <tr>
                        <td style="padding-right: 10px;"><i class="fas fa-heart"></i></td>
                        <td style="text-align: left; color: #064E3B;"><b>CARE</b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:left;">
                            <p>
                                Premium pet care: Trust us for expert veterinary 
                                services and compassionate treatment for your furry companions
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px;"><i class="fas fa-notes-medical"></i></td>
                        <td style="text-align: left; color: #064E3B;"><b>INFORMING</b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:left;">
                            <p>
                                Stay informed with vet-approved resources 
                                covering pet health, nutrition, and care 
                                essentials on our comprehensive platform
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="center-img">
            <img style="width: 600px; height: 600px;" src="img/home/center-dog.png" alt="Dog Image">
        </div>
        <div class="icon-container right">
            <div class="icon">
                <table>
                    <tr>
                        <td style="text-align: right; color: #064E3B;"><b>HEALTH</b></td>
                        <td style="padding-left: 10px;"><i class="fas fa-plus"></i></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">
                            <p>
                                Optimize your pet's health with our expert 
                                guidance on nutrition, wellness, and 
                                preventive care strategies for long-term well-being
                            </p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; color: #064E3B;"><b>COMFORTABILITY</b></td>
                        <td style="padding-left: 10px;"><i class="fas fa-paw"></i></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">
                            <p>
                                Ensure your pet's comfort with our personalized 
                                care approach, providing tailored solutions 
                                for their happiness and well-being.
                            </p>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <br>
    <!--ARTICLE CONTAINER-->
    <div class="article-container">
        <center>
            <h2>Facts</h2>
            <p><b>Check out how you can take care of your fur babies!</b></p>
        </center>
        <div class="scrollable-container">
            <div class="arrow-container left-arrow" onclick="prevArticle()">
                <i class="fas fa-chevron-left arrow"></i>
            </div>
            <div class="scrollable-div">
                <div class="article empty-article"></div>
                <div class="article">
                    <div class="facts">
                        <i style="font-size: 30px; margin-top: 2%; color: #65A30D" class="fas fa-heart"></i>
                        <h3>Pet Care</h3>
                        <hr class="line">
                        <p>
                            Just like humans, pets need a balanced diet to stay healthy. 
                            Consult with a veterinarian to determine the best food 
                            for your pet's age, size, and health needs. 
                            Avoid feeding them human food that may be harmful to their health.
                        </p>
                    </div>
                </div>
                <div class="article">
                    <div class="facts">
                        <i style="font-size: 30px; margin-top: 2%; color: #65A30D" class="fas fa-dumbbell"></i>
                        <h3>Regular Exercise</h3>
                        <hr class="line">
                        <p>
                            All pets need regular physical activity to maintain a healthy 
                            weight and mental stimulation. Take dogs for walks, 
                            play games with cats, or provide toys and activities 
                            appropriate for your pet's species.
                        </p>
                    </div>
                </div>
                <div class="article">
                    <div class="facts">
                        <i style="font-size: 30px; margin-top: 2%; color: #65A30D" class="fas fa-stethoscope"></i>
                        <h3>Veterinary Care</h3>
                        <hr class="line">
                        <p>
                            Regular check-ups with a veterinarian are crucial for 
                            your pet's well-being. Vaccinations, parasite control, 
                            dental care, and early detection of health issues are 
                            all part of maintaining your pet's health.
                        </p>
                    </div>
                </div>
                <div class="article">
                    <div class="facts">
                        <i style="font-size: 30px; margin-top: 2%; color: #65A30D" class="fas fa-soap"></i></i>
                        <h3>Grooming</h3>
                        <hr class="line">
                        <p>
                            Regular grooming is important for many pets. Brushing 
                            their fur, trimming nails, cleaning ears, and brushing 
                            teeth are all tasks that help prevent health issues 
                            and keep your pet comfortable and clean.
                        </p>
                    </div>
                </div>
                <div class="article">
                    <div class="facts">
                        <i style="font-size: 30px; margin-top: 2%; color: #65A30D" class="fas fa-bone"></i></i>
                        <h3>Emotional Well-being</h3>
                        <hr class="line">
                        <p>
                            Pets also need love, attention, and mental stimulation. 
                            Spend quality time with your pet, provide enrichment 
                            activities, and create a safe and comfortable environment 
                            for them to thrive in. Recognize signs of stress or 
                            illness and address them promptly.
                        </p>
                    </div>
                </div>
                <div class="article empty-article"></div>
            </div>
            <div class="arrow-container right-arrow" onclick="nextArticle()">
                <i class="fas fa-chevron-right arrow"></i>
            </div>
            <div class="indicator-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div> 
    <script src="script/home.js"></script>

    <!--TEAM CONTAINER-->
    <div class="doc-container">
        <br>
        <br>
        <center>
            <h2>Meet Our Team!</h2>
            <p><b>Meet the skilled professionals dedicated to your pet's well-being.</b></p>
        </center>
        <div class="grid-container">
            <div class="grid-item">
                <img src="img/home/Dr.Doe.png" alt="Image 1">
                <div class="info-container">
                    <h5>Dr. Doe</h5>
                    <p>Veterinarian</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Dr.Smith.png" alt="Image 2">
                <div class="info-container">
                    <h5>Dr. Smith</h5>
                    <p>Veterinarian</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Dr.White.png" alt="Image 7">
                <div class="info-container">
                    <h5>Dr. White</h5>
                    <p>Veterinarian</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Dr.Nguyen.png" alt="Image 8">
                <div class="info-container">
                    <h5>Dr. Nguyen</h5>
                    <p>Veterinarian</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Dr.Johnson.png" alt="Image 3">
                <div class="info-container">
                    <h5>Dr. Johnson</h5>
                    <p>Surgeon</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Dr.Patel.png" alt="Image 4">
                <div class="info-container">
                    <h5>Dr. Patel</h5>
                    <p>Surgeon</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Dr.Chen.png" alt="Image 5">
                <div class="info-container">
                    <h5>Dr. Chen</h5>
                    <p>Dentist</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Dr.Rodriguez.png" alt="Image 6">
                <div class="info-container">
                    <h5>Dr. Rodriguez</h5>
                    <p>Dentist</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Ms.Smith.png" alt="Image 9">
                <div class="info-container">
                    <h5>Ms. Smith</h5>
                    <p>GPV</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="img/home/Mr.Lee.png" alt="Image 10">
                <div class="info-container">
                    <h5>Mr. Lee</h5>
                    <p>GPV</p>
                </div>
            </div>
        </div>
    </div>

    <!--FEEDBACK CONTAINER-->
    <div class="review-container">
        <br>
        <br>
        <center>
            <h2>Client Feedback</h2>
            <p><b>Your feedback makes us strive for excellence!</b></p>
        </center>
        <div class="feedback-slide" style="display: block;">
            <center>
                <div class="circle">
                    <i class="fas fa-user"></i>
                </div>
            </center>
            <hr class="line" style="width: 120px;">
            <h3 style="margin-bottom: 0;">Jestin Clark V. Sacayle</h3>
            <h4 style="margin-top: 0; color:#65A30D">Fur Parent</h4>
            <p>....</p>
        </div>
        <div class="feedback-slide" style="display: none;">
            <center>
                <div class="circle">
                    <i class="fas fa-user"></i>
                </div>
            </center>
            <hr class="line" style="width: 120px;">
            <h3 style="margin-bottom: 0;">Euvert Zion Pagad</h3>
            <h4 style="margin-top: 0; color:#65A30D">Fur Parent</h4>
            <p>....</p>
        </div>
        <div class="feedback-slide" style="display: none;">
            <center>
                <div class="circle">
                    <i class="fas fa-user"></i>
                </div>
            </center>
            <hr class="line" style="width: 120px;">
            <h3 style="margin-bottom: 0;">Keannu Manabilang</h3>
            <h4 style="margin-top: 0; color:#65A30D">Fur Parent</h4>
            <p>....</p>
        </div>
        <div class="feedback-slide" style="display: none;">
            <center>
                <div class="circle">
                    <i class="fas fa-user"></i>
                </div>
            </center>
            <hr class="line" style="width: 120px;">
            <h3 style="margin-bottom: 0;">Ijay Jaculbe</h3>
            <h4 style="margin-top: 0; color:#65A30D">Fur Parent</h4>
            <p>....</p>
        </div>
        <div class="feedback-slide" style="display: none;">
            <center>
                <div class="circle">
                    <i class="fas fa-user"></i>
                </div>
            </center>
            <hr class="line" style="width: 120px;">
            <h3 style="margin-bottom: 0;">Alvin Villanueva</h3>
            <h4 style="margin-top: 0; color:#65A30D">Fur Parent</h4>
            <p>....</p>
        </div>
        <div class="dot-indicators">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <script src="script/feedback.js"></script>

    <!--EMBED MAP-->
    <div class="map-container">
        <center>
            <h2>Our Location</h2>
            <p><b>Visit our clinic and see our loving family!</b></p>
        </center>
        <br>
        <br>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36721.64408200152!2d120.93125248967084!3d14.662342305804902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b5b2dae3a04f%3A0x5edf44f955d70f0f!2sFur-Paws%20Veterinary%20Clinic!5e0!3m2!1sen!2sph!4v1716812315376!5m2!1sen!2sph" width="1350" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
    <!--BOOKING CONTAINER-->
    <div class="booking-container">
        <div class="content left">
            <h2 style="margin-top: 0; margin-bottom: 0; margin-left: 20%; color: #E2EBE7">Need Assitance?</h2>
            <p style="margin-top: 0; margin-bottom: 0; margin-left: 20%;"><b>Book an appointment now!</b></p>
        </div>
        <div class="content right">
            <button type="button" class="book"><p><b>Book Appointment</b></p></button>
        </div>
    </div>
    <?php include_once 'template/footer.php';?>
    
</body>
</html>