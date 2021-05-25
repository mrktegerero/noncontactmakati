<?php
    $data = $_POST;
    $violation_no = (int) $data['violation_no'];
    $plate_no = $data['plate_no'];
    $full_name = $data['full_name'];
    
    try{
        $command = "DELETE FROM users WHERE violationno={$violation_no}";
        include('connect.php');

        $conn->exec($command);

        echo json_encode([
            'success' => true,
            'message' => 'Plate No: ' .$plate_no. ' successfully deleted'
        ]);

    } catch (PDOException $e){
        echo json_encode([
            'success' => false,
            'message' => 'Error processing your request'
        ]);
    }