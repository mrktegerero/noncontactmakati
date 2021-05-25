<?php

include('connect.php');


$stmt = $conn->prepare("SELECT * FROM users WHERE clearance='Not yet Settled'");
$stmt->execute(); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);


return $stmt->fetchAll();

