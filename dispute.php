<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location: password.php');
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'disputes';
    $user = ($_SESSION['user']);
 
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
        <link href="https://fonts.gstatic.com/s/karla/v14/qkBbXvYC6trAT7RVLtw.woff2" rel="stylesheet">
        <link rel="stylesheet" href=" https://fonts.gstatic.com/s/ebgaramond/v14/SlGDmQSNjdsmc35JDF1K5E55YMjF_7DPuGi-6_RkC49_S6w.woff2">
       <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
        <!--Scroll reveal CDN-->
        <script src="https://unpkg.com/scrollreveal"></script>
        <!--Our own stylesheet-->
        <link rel="stylesheet" type="text/css" href="assets/css/dispute.css?v=<?php echo time(); ?>">
    </head>
    <body>
    <script> window.history.forward();</script>
    <section class="home" id="home" style="background-image: url('assets/img/coverfinal.jpg')">
        <a href="violation.php" class="nav__logo">
                <img src="assets/img/icon1.png" alt="" class="logo"></a>
                <nav class="nav bd-container">
        <?php include('partials/nav-violation.php')?>

</nav>

        <section class="about section bd-container" id="about">  <div class="about__data__makati">
<span class="section-subtitle-center-makati">DISPUTE FORM</span>
</div>

            <div class="about__container bd-grid">
            <div class="about__data2">
                        <p class="about__description3">For dispute form, you can raise disputes for clarification of your violation.  </p>
                        
                        <div>
                            <span class="about__number"><?= $user['platenumber']?></span>
                            <span class="about__achievement">Plate Number</span>
                        </div>

                        <div>
                            <span class="about__number"><?= $user['violation']?></span>
                            <span class="about__achievement">Violation</span>
                        </div>
                        <div>
                            <span class="about__number1"><?= $user['clearance']?></span>
                            <span class="about__achievement">Remark</span>
                        </div>
                </div>
                <div id="userAddFormContainer">
                <label for="fullname">*REQUIRED</label>
                <?php 
                                    if(isset($_SESSION['response'])){
                                            $response_message = $_SESSION['response']['message'];
                                            $is_success = $_SESSION['response']['success'];
                                ?>
                                    <div class="responseMessage">
                                        <p class="<?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                            <?= $response_message ?>
                                        </p>
                                    </div>
                       
                                <?php unset($_SESSION['response']); } ?>
                                <form action="database/add-dispute.php" method="POST" class="appForm">
                                    <div class="appFormInputContainer"> 
                                        <label for="platenumber">Plate Number*</label>
                                        <input type="text" class="appFormInput" id="platenumber" name="platenumber" oninput="this.value = this.value.toUpperCase()" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="fullname">Name*(Lastname, Firstname)</label>
                                        <input type="text" class="appFormInput" id="fullname" name="fullname"  required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="email">Email Address*</label>
                                        <input type="text" class="appFormInput" id="email" name="email" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="contactno">Contact Number*</label>
                                        <input type="text" class="appFormInput" id="contactno" name="contactno" required> 
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="subjects">Complaint* (Avoid using apostrophe ('))</label>
                                        <textarea type="text" id="subjects" class="appFormInput" name="subjects" placeholder="Write something.." style="height:200px" required></textarea>
                                    </div>
                                    <button type="submit" class="appBtn">Sumbit Form</button>
                                </form>
                             
                </div>
               
               


               
            </div>
        </section>
    </section>
    
  <!-- MAIN JS -->
  <script src='assets/js/violation.js?v=<?php echo time(); ?>'></script>
    </body>
    </html>