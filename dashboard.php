<?php 
    session_start();
    if(!isset($_SESSION['admin'])) header('location: adminpass.php');
    if(!isset($_SESSION['admin'])) header('location: admin.php');

    $admin = ($_SESSION['admin']);
    $users = include('database/show-users.php');
    $inprogress = include('database/inprogress.php');
    $cleared = include('database/cleared.php');
    $disputes = include('database/t-disputes.php');
    $pending = include('database/t-pending.php');
    $done = include('database/t-done.php');

 
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
                <div class="rows">
                    <div class="column column-1">
                        <h1 class="sectionheader">Not yet Settled Violations</h1>
                        <p class="inprogress user"><?= count($inprogress) ?></p>
                        <h3 class="sectionbottom">Violations</h3>
                        
                    </div>
                    <div class="column column-2">
                        <h1 class="sectionheader">Settled Violations</h1>
                        <p class="cleared user"><?= count($cleared)?></p>
                        <h3 class="sectionbottom">Violations</h3>
                    </div>
                    <div class="column column-3">
                        <h1 class="sectionheader">Total Violations</h1>
                        <p class="violation user"><?= count($users) ?></p>
                        <h3 class="sectionbottom">Violations</h3>
                        
                    </div>
                    <div class="column column-9">
                        <h1 class="sectionheader">Pending Disputes</h1>
                        <p class="inprogress user"><?= count($pending) ?></p>
                        <h3 class="sectionbottom">Disputes</h3>
                    </div>
                    <div class="column column-10">
                        <h1 class="sectionheader">Completed Disputes</h1>
                        <p class="cleared user"><?= count($done)?></p>
                        <h3 class="sectionbottom">Disputes</h3>
                    </div>
                    <div class="column column-11">
                        <h1 class="sectionheader">Total Disputes</h1>
                        <p class="violation user"><?= count($disputes) ?></p>
                        <h3 class="sectionbottom">Disputes</h3>
                        
                        
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
      <script></script>
    </body>
    </html>
