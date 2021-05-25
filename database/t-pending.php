<?php

include('connect.php');


$stmt = $conn->prepare("SELECT * FROM disputes WHERE approval='Pending'");
$stmt->execute(); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);


return $stmt->fetchAll(); 
