<?php
  $data = $_POST;
    $dispute_no = (int) $data['dispute_no'];
    $approval_type = $data['approval_type'];
    
     try{
      
        $sql = "UPDATE disputes SET approval=? WHERE disputeno=?";
        include('connect.php');
        $conn->prepare($sql)->execute([$approval_type, $dispute_no]);

        echo json_encode([
            'success' => true,
            'message' => 'Are you sure you want to update dispute no:  ' .$dispute_no. ' ?'
        ]);
        

     } catch (PDOException $e){
        echo json_encode([
            'success' => false,
            'message' => 'Error processing your request'
        ]);
     }