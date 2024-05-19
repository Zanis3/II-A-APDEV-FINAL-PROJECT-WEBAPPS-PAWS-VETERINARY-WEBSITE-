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

    <div class="hero-container">
        <div class="hero-text">
            <h1 id="hero-title">Welcome to Paws Veterinary Clinic</h1>
            <p id="hero-sub">Providing quality care for your pets.</p>
        </div>
        <div class="hero-img">
            <img src="img/login/dog-login.jpg" alt="">
        </div>
    </div>

    <div class="container">
        <div class="text-container">
            <h1 id="text-title">Our Services</h1>
            <p id="text-sub">Browse our range of veterinary services</p>
        </div>
        <div class="services-items">
            <div class="item">
                <div class="item-top"></div>
                <div class="item-desc">test alpha</div>
            </div>
            <div class="item">
                <div class="item-top"></div>
                <div class="item-desc">test beta</div>
            </div>
        </div>
    </div>

    <div class="container article">
        <div class="text-container">
            <h1 id="text-title">Healthy Pets for a Happy Life</h1>
            <p id="text-sub">Read informative articles on pet care</p>
        </div>
        <div class="article-menu">
            <div class="article-items">
                <div class="article-image"></div>
                <div class="article-desc">
                    <div id="article-title">test article</div>
                    <div id="article-summary">test summary test summary test summ...</div>
                    <div id="article-author">
                        <div id="author-image"></div>
                        <p id="article-author-name">Tester Anderson</p> 
                    </div>
                </div>
            </div>
            <div class="article-items">
                <div class="article-image"></div>
                <div class="article-desc">
                    <div id="article-title">test article</div>
                    <div id="article-summary">test summary test summary test summ...</div>
                    <div id="article-author">
                        <div id="author-image"></div>
                        <p id="article-author-name">Tester Anderson</p> 
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="container">
        <div class="text-container">
            <h1 id="text-title">Our Team</h1>
            <p id="text-sub">Meet our experienced veterinarians!</p>
        </div>
        <div class="vet-menu">
            <div class="vet-item">
                <div class="vet-portrait"></div>
                <div class="vet-desc">
                    <div class="vet-name">Tester Anderson</div>
                    <div class="vet-title">Veterinarian</div>
                    <div class="vet-fun-fact">10+ Years of Experience!</div>
                </div>
            </div>
            <div class="vet-item">
                <div class="vet-portrait"></div>
                <div class="vet-desc">
                    <div class="vet-name">Tester Anderson</div>
                    <div class="vet-title">Surgeon</div>
                    <div class="vet-fun-fact">Specializes in Complex Surgeries</div>
                </div>
            </div>
        </div>
    </div>

    <div class="appointment-container">
        <div class="appointment-image"></div>
        <div class="appointment-form">
            <div class="appointment-title">
                <h1 id="text-title">Book an Appointment</h1>
                <p id="text-sub">Schedule a visit with your pet</p>
            </div>
            <form action="" method="post">
                <div id="form-data">
                    <p id="text-sub">Pet Name: </p>
                    <input type="text" name="txtPetName" placeholder="Enter name of pet">
                </div>
                <div id="form-data">
                    <p id="text-sub">Preferred Date: </p>
                    <input type="date" name="txtAppointmentDate" min="<?php echo date('Y-m-d');?>">
                </div>
                <div id="form-data">
                    <p id="text-sub">Pet Type: </p>
                    <div class="radio-container">
                        <span>
                            <input type="radio" name="rdoPetType" value="Cat">
                            Cat
                        </span>
                        <span>
                            <input type="radio" name="rdoPetType" value="Dog">
                            Dog
                        </span>
                        <span>
                            <input type="radio" name="rdoPetType" value="Bird">
                            Bird
                        </span> 
                    </div>
                </div>
                <input type="submit" value="Schedule Now" name="btnScheduleNow">
            </form>
        </div>
    </div>

    <?php include_once 'template/footer.php';?>
    
</body>
</html>