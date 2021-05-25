<?php
session_start();
if (isset($_SESSION['user'])) header('location: password.php');

$error_message = '';
$confirm_message = '';



if ($_POST) {
    include('database/connect.php');

    $platenumber = $_POST['platenumber'];

    $query = 'SELECT * FROM users WHERE users.platenumber="' . $platenumber . '" LIMIT 1';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll()[0];
        $_SESSION['user'] = $user;

        header('location: password.php');
    } else $congrats_message = 'Please make sure platenumber is correct';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Non-Contact</title>

    <link rel="icon" href="assets/img/icon.png" type="image/gif" sizes="18x18">
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" rel="stylesheet">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--Our own stylesheet-->
    <link rel="stylesheet" type="text/css" href="assets/css/login.css?v=<?php echo time(); ?>">
</head>
<script>
    window.history.forward();
</script>

<body>

    <section class="home" id="home" style="background-image: url('assets/img/coverfinal.jpg')">
        <a href="login.php" class="nav__logo">
            <img src="assets/img/icon1.png" alt="" class="logo"></a>
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="login.php" class="nav__link active-link">HOME</a></li>
                        <li class="nav__item"><a href="#mission" class="nav__link">OUR MISSION</a></li>
                        <li class="nav__item"><a href="#faqs-header" class="nav__link">FAQS</a></li>
                    </ul>
                </div>


            </nav>
        </header>


        <section class="about section bd-container" id="about">

            <?php include('partials/front-page.php') ?>
            <form action="login.php" method="POST" class="about__data">
                <h2 class="section-title-center">Check Plate Number</h2>

                <div class="send__direction">
                    <label for="Platenumber"></label>
                    <input type="text" name="platenumber" placeholder="Enter Plate Number or Conduction Sticker" class="login__input" style="height:3rem" required>
                    <button class="button">
                        <div type="submit">Search</div>
                    </button>
                </div>
                <?php if (!empty($congrats_message)) { ?>

                    <div class="error" id="congratsMessage">
                        <button class="close" onclick="document.getElementById('congratsMessage').style.display='none'"><i class="fa fa-times " aria-hidden="true"></i></button>

                        <h3 class="message2">Congratulations! You have no pending violations in City Makati</h3>
                        <p class="message3">Thank you for taking the time to check if your vehicle was recorded to have violated Makati City's traffic ordinance. Keep up the good work and drive safely!</p>

                    </div>
                <?php } ?>
            </form>




        </section>
    </section>

    <section class="backgroundd">
        <section class="accessory section bd-container" id="accessory">
            <h2 class="section-title-acc">WHAT SHOULD I DO IF I GET A<br> NOTICE OF VIOLATION?</h2>

            <div class="accessory__container bd-grid">
                <div class="accessory__content">
                    <h3 class="accessory__title"><i class="fas fa-sign-in-alt"></i> LOGIN</h3>
                    <span class="accessory__category">Enter your notice of violation in our search box</span>
                </div>
                <div class="accessory__content">
                    <img src="assets/img/mouse1.png" alt="" class="accessory__img">
                    <h3 class="accessory__title"><i class="fa fa-folder-open"></i> CLEARANCE</h3>
                    <span class="accessory__category">View remarks for clearance if it's still in progress or already cleared</span>
                </div>
                <div class="accessory__content">
                    <img src="assets/img/keyboard3.png" alt="" class="accessory__img">
                    <h3 class="accessory__title"><i class="fa fa-handshake"></i> DISPUTE</h3>
                    <span class="accessory__category">Can raise a dispute if he/she knows that they didn’t commit a violation</span>
                </div>
                <div class="accessory__content">
                    <img src="assets/img/headphone1.png" alt="" class="accessory__img">
                    <h3 class="accessory__title"><i class="fa fa-money-bill-alt"></i> Payments</h3>
                    <span class="accessory__category">Send a receipt or a screenshot that they already pay their penalties, and immediately their name will be cleared in the clearance tab </span>
                </div>
            </div>
        </section>
    </section>

    <section class="home2" id="home2" style="background-image: url('assets/img/cover4.jpg')">
        <section class="mission section bd-container" id="mission">
            <div class="about__mission">
                <p class="mission-text">PURPOSE</p>
                <h2 class="section-title-mission">THE MISSION</h2>
                <p class="mission-text">The proponents aim to design, build and implement a centralized web-based interactive Management System for Traffic violators caught via a Non-contact apprehension scheme implemented by the Traffic Management office of the City of Makati. The Non-contact Traffic Apprehension policy utilizes CCTVs, digital cameras, and/or other gadgets or technology to capture videos and images to apprehend vehicles violating traffic laws, rules, and regulations. </p>
            </div>
        </section>
    </section>

    <section class="faqs-header" id="faqs-header">
        <div class="container-faqs-header">
            <div class="header">
                <h1>FAQS</h1>
                <h4>Find out if we have answered your queries below or get in contact with our call center for further clarifications</h4>
            </div>

        </div>
    </section>

    <section class="faqs" id="faqs">
        <div class="container-faqs">
            <div class="accodion-faqs">
                <div class="accordion-faqs-item" id="question1">
                    <a href="#question1" class="accordion-faqs-link">
                        What is Centralized Web-Based Management System for Non-Contact Traffic Violations?
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </a>
                    <div class="faqs-answer">
                        <p>It is a policy that utilizes CCTV, digital cameras and/or other gadgets or technology to capture videos and images to apprehend vehicles violating traffic laws, rules and regulations.</p>
                    </div>
                </div>
                <div class="accordion-faqs-item" id="question2">
                    <a href="#question2" class="accordion-faqs-link">
                        What is its coverage?
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </a>
                    <div class="faqs-answer">
                        <p>The No Contact Violation Policy covers all roads and intersections within the jurisdiction of Makati City
                        </p>
                    </div>
                </div>
                <div class="accordion-faqs-item" id="question3">
                    <a href="#question3" class="accordion-faqs-link">
                        Where should I pay to settle my violation?
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </a>
                    <div class="faqs-answer">
                        <p>The violator may pay thru GCash, Paymaya, and BPI.</p>
                    </div>
                </div>
                <div class="accordion-faqs-item" id="question4">
                    <a href="#question4" class="accordion-faqs-link">
                        How will Makati City send the Notice and Violation?
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </a>
                    <div class="faqs-answer">
                        <p>The Notice of Violation will be sent thru your registered phone number (SMS).</p>
                    </div>
                </div>
                <div class="accordion-faqs-item" id="question5">
                    <a href="#question5" class="accordion-faqs-link">
                        How will Makati City know about the records of the vehicle?
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </a>
                    <div class="faqs-answer">
                        <p>Makati City is connected to the Land Transportation Office. Motor vehicle records and Driver’s License Information of violators are retrieved electronically using LTO’s Local Government Unit Integrated Law Enforcement System (LGU-ILES).</p>
                    </div>
                </div>
                <div class="accordion-faqs-item" id="question6">
                    <a href="#question6" class="accordion-faqs-link">
                        If I don’t agree with the violation given to me, how do I contest it?
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </a>
                    <div class="faqs-answer">
                        <p>You may raise a dispute, in the dispute form where admins can review whether your violation/s can be avoided.
                        </p>
                    </div>
                </div>
                <div class="accordion-faqs-item" id="question7">
                    <a href="#question7" class="accordion-faqs-link">
                        What will happen if I don’t address the violation?
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </a>
                    <div class="faqs-answer">
                        <p>If a registered owner of the vehicle does not address the violation within five (5) business days upon receipt of the Notice of Violation and Ordinance Violation Receipt, Makati City will send an alarm to the Land Transportation Office for the motor vehicle registration; meaning, the violator will not be able to register his or her motor vehicle until penalties and/or fines are fully settled.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="footer">
        <div class="footer-content">
            <div class="footer-section about">
                <h1 class="logo-text"><span>CITY OF MAKATI</span></h1>
                <p>This website is dedicated to the Centralized Web-Based Management System for Non-Contact Traffic Violations in Makati City</p>
            </div>

            <div class="footer-section links">
                <h1>Quick Links</h1>
                <ul>
                    <a href="#accessory">
                        <li>What should i do</li>
                    </a>
                    <a href="#mission">
                        <li>Our Mission</li>
                    </a>
                    <a href="#faqs">
                        <li>Faqs</li>
                    </a>
                </ul>
            </div>
            <div class="footer-section contact-form">
                <h1>Contact Us</h1>
                <div class="contact">
                    <span><i class="fas fa-mobile-alt"></i> &nbsp; (02) 8870 1000</span>
                    <span><i class="fas fa-envelope"></i> &nbsp; makati@makati.gov.ph</span>
                </div>
                <div class="socials">
                    <a href="https://www.facebook.com/MyMakatiVerified" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/mymakati/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/Mayora_Abby" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; noncontact-makati | Designed by AMA Makati Students
        </div>
    </div>


    <!-- MAIN JS -->
    <script src="assets/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>