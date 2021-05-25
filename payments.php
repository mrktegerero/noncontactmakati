<?php 
    session_start();
    
    if(!isset($_SESSION['user'])) header('location: password.php');
    if(!isset($_SESSION['user'])) header('location: login.php');
    $user = ($_SESSION['user']);
   
?>
    <?php
     $_SESSION['table'] = 'users';

     $server_name = "localhost";
     $db_username = "root";
     $db_password = "";
     $db_name = "inventory";
     
   $connection = mysqli_connect($server_name,$db_username,$db_password);
   $dbconfig = mysqli_select_db($connection,$db_name);
   
   if(isset($_POST['update']))
   {
       $pincode_update = $_POST['pincode'];
       $files_update = $_FILES["files"]['name'];

       $query = "UPDATE users SET files='$files_update',paystime=NOW() WHERE pincode='$pincode_update'";
       $query_run = mysqli_query($connection,$query);

       if($query_run)
       {
        move_uploaded_file($_FILES['files']['tmp_name'], "receipt/".$_FILES['files']['name']);
        echo '<script type="text/javascript"> alert("Are you sure you want to send Receipt? ") </script>';
       }
       else{
        echo '<script type="text/javascript"> alert("Receipt not sent") </script>';
       }
    
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
        <section class="about section bd-container" id="about">  <div class="about__data__makati">
<span class="section-subtitle-center-makati">UPLOAD PAYMENTS</span>
</div>
            <div class="about__container1">
              
            <div class="about__data">
                 
                        <p class="about__description2">Your vehicle was recorded by our traffic enforcement camera to have commited a violation agants Local Traffic Code of Makati City. You can upload the screenshot of your receipt for your violation to be settled</p>
                        
                        <form action="" method="POST" enctype="multipart/form-data" class="appForm">
                            <div class="appFormInputContainer"> 
                                <label for="pincode">Pin Code*</label>
                                <input type="number" class="appFormInput" id="pincode" name="pincode" maxlength="6" required>
                            </div>
                            <div class="appFormInputContainer5"> 
                                <label for="files">Select image:</label>
                                <input type="file" id="files" name="files" accept="image/*" required>
                                <input type="submit" name="update" class="appBtn1">
                            </div>
                      
                        </form>
                        
                        
                        <div>
                            <span class="about__number"><?= $user['platenumber']?></span>
                            <span class="about__achievement">Plate Number</span>
                        </div>

                        <div>
                            <span class="about__number"><?= $user['vehicle']?></span>
                            <span class="about__achievement">Vehicle</span>
                        </div>

                        <div>
                        <span class="about__number">₱<?= $user['price']?>.00</span>
                            <span class="about__achievement">Amount</span>
                        </div>
                </div>
               


               
            </div>
        </section>
    </section>
    
  <!-- MAIN JS -->
  <script src='assets/js/violation.js?v=<?php echo time(); ?>'></script>


  
    </body>
    </html>