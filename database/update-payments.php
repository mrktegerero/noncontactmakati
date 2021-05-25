<?php
  $data = $_POST;
    $violation_no = (int) $data['violation_no'];
    $clearance_type = $data['clearance_type'];
    $time_type = $data['time_type'];
    
     try{
      
        $sql = "UPDATE users SET clearance=?, paystime=NOW() WHERE violationno=?";
        include('connect.php');
        $conn->prepare($sql)->execute([$clearance_type, $violation_no]);

        echo json_encode([
            'success' => true,
            'message' => 'Are you sure you want to settle Vioaltion no: ' .$violation_no. ' ?'
        ]);

     } catch (PDOException $e){
        echo json_encode([
            'success' => false,
            'message' => 'Error processing your request'
        ]);
     }

  