<?php 
    session_start();
    if(!isset($_SESSION['admin'])) header('location: adminpass.php');
    if(!isset($_SESSION['admin'])) header('location: login.php');

    $admin = ($_SESSION['admin']);

    $conn = mysqli_connect("localhost", "root", "", "inventory");
   
    if(isset($_POST['submit'])){

        $old_pass=$_POST['old_pass'];
        $new_pass=$_POST['new_pass'];
        $re_pass=$_POST['re_pass'];
 
        $query="SELECT pincode FROM admins WHERE platenumber='admin'";
        $result=mysqli_query($conn, $query);
 
        while($row = mysqli_fetch_array($result))
        {
            $pincode=$row['pincode'];
 
            if($pincode==$old_pass){
                if($new_pass==$re_pass){
                    
                    $q= "UPDATE admins SET pincode='$new_pass' WHERE platenumber='admin'";
                    $update=mysqli_query($conn, $q);

                    if($update){
                        echo "<script>alert('Success')</script>";
                    }else{
                        echo "<script>alert('Your new and Retype Password is not match')</script>";
                    }


               }else{
                 echo "<script>alert('Your old password is wrong')</script>";
               }
             }else{
               echo "<script>alert('Your new and Retype Password is not match')</script>";
             }
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
    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">

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
    <link rel="stylesheet" href="assets/css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" />
</head>
<body>
<script> window.history.forward();</script>
    <div class="" id="dashboardMainContainer">
       <?php include('partials/app-sidebar.php')?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/app-topnav.php')?>
            <div class="dashboard_content">          
                <div class="dashboard_content_main">
                  
    <!-- <div class="container" style="padding-left:35%;"> -->
      <div class="container" style=" padding-top:30px;">
      <div class="page-header">

        <!-- <h1 style="margin-bottom:50px; margin-right:50%; color:red;">Change / update password in PHP using MySql and WampServer</h1> -->
       <h1 style="margin-bottom:50px; margin-right:50%;"> Change Admin Password</h1>

        <div style="width:30%;">
          <form action="change-pass.php" method="post">
            <div class="form-group">
              <label >Old Password</label>
              <input type="password" class="form-control" name="old_pass" placeholder="Old Password...">
            </div>
            <div class="form-group">
              <label >New Password</label>
              <input type="password" class="form-control" name="new_pass" placeholder="New Password...">
            </div>
            <div class="form-group">
              <label >Re-Type New Password</label>
              <input type="password" class="form-control" name="re_pass" placeholder="Re-Type New Password...">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>

      </div>

    </div>


                </div>
            </div>
        </div>

      <!-- MAIN JS -->
      <script src='assets/js/scripts.js?v=<?php echo time(); ?>'></script>
         <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous"></script>   




    </body>
    </html>
