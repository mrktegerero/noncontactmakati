<?php
   $connect = mysqli_connect("localhost", "root", "");
   $db = mysqli_select_db($connect, 'inventory');

   if(isset($_POST['submit']))

   {
       $pincode = $_POST['pincode'];
       $files = $_FILES["files"]['name'];

       $tar = "../receipt/".$_FILES["files"]['name'];

       $query = "UPDATE 'users' SET files='$files',paystime=NOW() WHERE pincode='$pincode'";
       $query_run = mysqli_query($connect, $query);

       if($query_run)
       {
           move_uploaded_file($_FILES["files"]["tmp_name"], $tar);
           $_SESSION['success'] = 'receipt added';
           header('location: ../payments.php');
       }
       else {
        $_SESSION['success'] = 'receipt not added';
        header('location: ../payments.php');
       }
   }

   ?>

   <?php
 $pincode = $_POST['pincode'];
 $files = $_FILES["files"]['name'];
 $paystime = $_POST['paystime'];
    
     try{
      
        $sql = "UPDATE 'users' SET files='$files',paystime=NOW() WHERE pincode='$pincode'";
        include('connect.php');
        $conn->prepare($sql)->execute([$files, $paystimes]);

        echo json_encode([
            'success' => true,
            'message' => 'Dispute Request No: successfully updated'
        ]);
        

     } catch (PDOException $e){
        echo json_encode([
            'success' => false,
            'message' => 'Error processing your request'
        ]);
     }

     if(isset($_POST['submit']))
     {
         $target = "../receipt/".$_FILES['files']['name'];
         move_uploaded_file($_FILES['files']['tmp_name'], $target);
     }