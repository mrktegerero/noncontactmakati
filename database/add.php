<?php
    session_start();

    $table_name = $_SESSION['table'];  
    $platenumber = $_POST['platenumber'];
    $vehicle = $_POST['vehicle'];
    $fullname = $_POST['fullname'];
    $num = $_POST['num'];
    $violation = $_POST['violation'];
    $clearance = $_POST['clearance'];
    $dates = $_POST['dates'];
    $times = $_POST['times'];
    $price = $_POST['price'];
    $violationfile = $_FILES['violationfile']['name'];
    $pincode = $_POST['pincode'];


//Adding the record
    try{
        $command = "INSERT INTO 
                            $table_name(platenumber, vehicle, fullname, num, violation, clearance, dates, times, price, violationfile, pincode) 
                        VALUES 
                            ('".$platenumber."', '".$vehicle."', '".$fullname."', '".$num."', '".$violation."', '".$clearance."', '".$dates."', '".$times."', '".$price."', '".$violationfile."', '".$pincode."')";
        
  

        include('connect.php');

        $conn->exec($command);

       

            $response = [
                'success' => true,
                'message' => $platenumber . ' ' . $vehicle . ' successfully added to the system.'
            ];
        
    } catch (PDOException $e){
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
    


    $_SESSION['response'] = $response;
    header('location: ../users-add.php');



    if(isset($_POST['submit']))
    {
        $target = "../upload/".$_FILES['violationfile']['name'];
        move_uploaded_file($_FILES['violationfile']['tmp_name'], $target);
    }
?>

