<?php 
    session_start();
    if(!isset($_SESSION['user'])) header('location: password.php');
    if(!isset($_SESSION['user'])) header('location: login.php');

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
        <link rel="stylesheet" type="text/css" href="assets/css/violation.css?v=<?php echo time(); ?>">
    </head>
    <body>
    <script> window.history.forward();</script>
    <section class="home" id="home" style="background-image: url('assets/img/coverfinal.jpg')">
    <a href="violation.php" class="nav__logo">
                <img src="assets/img/icon1.png" alt="" class="logo"></a>
    <nav class="nav bd-container">
        <?php include('partials/nav-violation.php')?>

</nav>
       
               
        <section class="about section bd-container" id="about">
        <div class="about__data__makati">
<span class="section-subtitle-center-makati">VIOLATION DETAILS</span>
            <div class="about__container bd-grid">

               
        <div class="about__data">
                        <p class="about__description">Your vehicle was recorded by our traffic enforcement camera to have commited a violation againts Local Traffic Code of Makati City. You may settle your current violation right away. </p>
                        <p class="about__description1">Details:</p>
                        <div class="data">
                        <div>
                            <span class="about__number"><?= $user['platenumber']?></span>
                            <span class="about__achievement">Plate Number</span>
                        </div>

                        <div>
                            <span class="about__number"><?= $user['violation']?></span>
                            <span class="about__achievement">Violation</span>
                        </div>

                        <div>
                            <span class="about__number">₱<?= $user['price']?>.00</span>
                            <span class="about__achievement">Amount</span>
                        </div>
                        </div>
                </div>

                <div class="about__data2">
                <div class="imgmid">
                    <?php echo '<img src="upload/'.$user['violationfile'].'" id="myImgd" width="700px" height="700px;" alt="">'?>
                    <div id="myModald" class="modald">
                                                        <span class="closed">&times;</span>
                                                        <img class="modal-contentd" id="img01d">
                                                        <div id="captiond"></div>
                                                        </div>

                        </div>
                </div>
        </section>
      
    </section>
    
  <!-- MAIN JS -->
  <script src='assets/js/violation.js?v=<?php echo time(); ?>'></script>

  <script>
            // Get the modal
            var modald = document.getElementById("myModald");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var imgd = document.getElementById("myImgd");
            var modalImgd = document.getElementById("img01d");
            var captionTextd = document.getElementById("captiond");
            imgd.onclick = function(){
            modald.style.display = "block";
            modalImgd.src = this.src;
            captionTextd.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("closed")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
            modald.style.display = "none";
            }
            </script>
    </body>
    </html>