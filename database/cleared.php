<?php

include('connect.php');


$stmt = $conn->prepare("SELECT * FROM users WHERE clearance='Settled'");
$stmt->execute(); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);


return $stmt->fetchAll();

