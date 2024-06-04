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
            <h2>Articles</h2>
            <p><b>Read Informative articles on pet care!</b></p>
        </center>
        <div class="scrollable-container">
            <div class="arrow-container left-arrow" onclick="prevArticle()">
                <i class="fas fa-chevron-left arrow"></i>
            </div>
            <div class="scrollable-div">
                <div class="article empty-article"></div>
                <div class="article"></div>
                <div class="article">Article 2</div>
                <div class="article">Article 3</div>
                <div class="article">Article 4</div>
                <div class="article">Article 5</div>
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
    <div class="container appointment">
        <div class="appointment-image"></div>
        <div class="text-container">
            <h2 class="text-title">Book an Appointment</h2>
            <p class="text-sub">Schedule a visit for your pet!</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <label for="txtPetName">Pet Name</label>
                <input type="text" name="txtPetName" id="txtPetName" placeholder="Enter pet's name here." style="<?php if(!empty($nameError)){echo 'margin-bottom:auto;';}?>" value="<?php echo $_POST['txtPetName'];?>">
                <div class="warning" style="margin-bottom:5px;"><?php echo $nameError;?></div>

                <label for="txtDateOfAppointment">Preferred Date</label>
                <input type="date" name="txtDateOfAppointment" id="txtDateOfAppointment" min="<?php echo date('Y-m-d');?>" max ="<?php echo date('Y-m-d', strtotime('+2 weeks'))?>" value="<?php echo $_POST['txtDateOfAppointment'];?>" placeholder="Select date.">
                <div class="warning" style="margin-bottom:5px;"><?php echo $dateError;?></div>

                <label for="txtTimeOfAppointment">Preferred Time</label>
                <input type="time" name="txtTimeOfAppointment" id="txtTimeOfAppointment" min="09:00" max="17:00" step="3600000" value="<?php echo $_POST['txtTimeOfAppointment'];?>" placeholder="Select time.">
                <div class="warning" style="margin-bottom:5px;"><?php echo $timeError;?></div>

                <label for="radio-group">Pet Type</label>
                <div class="radio-group" id="radio-group">

                    <input type="radio" name="rdoPetType" id="pet-dog" value="Dog" class="radio-options" value="<?php if($_POST['rdoPetType'] == 'Dog'){echo 'checked';}?>">
                    <label for="pet-dog" class="radio-labels">Dog</label>
                    
                    <input type="radio" name="rdoPetType" id="pet-cat" value="Cat" class="radio-options" value="<?php if($_POST['rdoPetType'] == 'Cat'){echo 'checked';}?>">
                    <label for="pet-cat" class="radio-labels">Cat</label>

                </div>

                <div class="warning"><?php echo $radioError;?></div>

                <input type="submit" name="btnAppointmentHome" class="btnAppointmentHome" value="Schedule Now">

            </form>
        </div>        
    </div>

    <!--EMBED MAP-->
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36721.64408200152!2d120.93125248967084!3d14.662342305804902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b5b2dae3a04f%3A0x5edf44f955d70f0f!2sFur-Paws%20Veterinary%20Clinic!5e0!3m2!1sen!2sph!4v1716812315376!5m2!1sen!2sph" width="1350" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <?php include_once 'template/footer.php';?>
    
</body>
</html>