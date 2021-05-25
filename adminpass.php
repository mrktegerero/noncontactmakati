<?php 
    session_start();
    
    if(!isset($_SESSION['admin'])) header('location: login.php');
    
    $error_message = '';
    $confirm_message = '';

    if($_POST){
        include('database/connect.php');

        $pincode = $_POST['pincode'];

        $query = 'SELECT * FROM admins WHERE admins.pincode="'. $pincode .'" LIMIT 1';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $admin = $stmt->fetchAll()[0];
            $_SESSION['admin'] = $admin;

            header('Location: dashboard.php');

        

        }else $congrats_message = 'Please make sure platenumber is correct';
     
    }
 
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
        <link rel="stylesheet" type="text/css" href="assets/css/password.css?v=<?php echo time(); ?>">
    </head>
    <body>
    <script> window.history.forward();</script>
    
         <section class="home" id="home" style="background-image: url('assets/img/coverfinal.jpg')">
        <a href="admdinpass.php" class="nav__logo">
                <img src="assets/img/icon1.png" alt="" class="logo"></a>
        <section class="about section bd-container" id="about">
        <?php include('partials/front-page.php')?>
                <form action="adminpass.php" method="POST" class="about__data">
                    <h2 class="section-title-center">Admin Password</h2>
                    <a href="database/logoutadmin.php" id="logoutBtn"><i class="fa fa-power-off"></i></a>
                        <div class="send__direction">
                        <label for="pincode"></label>
                        <input type="password" name="pincode" placeholder="Password" class="login__input" minlength="4" style="height:3rem"required>
                        <button class="button">
                            <div type="submit">Pincode</div>
                        </button>
                        </div>
                        <?php if(!empty($congrats_message)) { ?>
                                    
                                    <div class="error" id="congratsMessage">
                                    <button class="close" onclick="document.getElementById('congratsMessage').style.display='none'" ><i class="fa fa-times " aria-hidden="true"></i></button>
                                       <h3 class="message2">Error!</h3>
                                       <h3 class="message2">You have entered wrong pin code / password</h3>
                                       
                                   </div>
                               <?php } ?>
                </form>
                

      
                </script>

               
        </section>
        </section>

           <!-- MAIN JS -->
      <script src="assets/js/main.js?v=<?php echo time(); ?>"></script>
    </body>
    </html>