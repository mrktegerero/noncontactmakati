<?php
    session_start();

    $table_name = $_SESSION['table'];  
    $platenumber = $_POST['platenumber'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $subjects = $_POST['subjects'];
    $approval = $_POST['approval'];

//Adding the record
    try{
        $command = "INSERT INTO 
                            $table_name(platenumber, fullname, email, contactno, dates, subjects, approval) 
                        VALUES 
                            ('".$platenumber."', '".$fullname."', '".$email."', '".$contactno."', NOW(), '".$subjects."', 'Pending')";

        include('connect.php');

        $conn->exec($command);
        $response = [
            'success' => true,
            'message' => $platenumber . ' ' . $fullname . ' request successfully send to Makati Traffic Bureau.'
        ];

    } catch (PDOException $e){
        $response = [
            'success' => false,
            'message' => $platenumber . ' ' . $fullname . ' not successfully send to Makati Traffic Bureau.'
        ];
    }

    $_SESSION['response'] = $response;
    header('location: ../dispute.php');
?>