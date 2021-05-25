<?php
  $data = $_POST;
    $violation_no = (int) $data['violation_no'];
    $plate_no = $data['plate_no'];
    $vehicle_type = $data['vehicle_type'];
    $full_name = $data['full_name'];
    $mobile_number = $data['mobile_number'];
    $violation_type = $data['violation_type'];
    $clearance_type = $data['clearance_type'];
    $dates_type = $data['dates_type'];
    $times_type = $data['times_type'];
    $price_type = $data['price_type'];
    $pin_code = $data['pin_code'];
    
     try{
      
        $sql = "UPDATE users SET platenumber=?, vehicle=?, fullname=?, num=?, violation=?, clearance=?, dates=?, times=?, price=?, pincode=? WHERE violationno=?";
        include('connect.php');
        $conn->prepare($sql)->execute([$plate_no, $vehicle_type, $full_name, $mobile_number, $violation_type, $clearance_type, $dates_type, $times_type, $price_type, $pin_code, $violation_no]);

        echo json_encode([
            'success' => true,
            'message' => 'Are you sure you want to update Plate Number: ' .$plate_no. ' ?'
        ]);

     } catch (PDOException $e){
        echo json_encode([
            'success' => false,
            'message' => 'Error processing your request'
        ]);
     }

  