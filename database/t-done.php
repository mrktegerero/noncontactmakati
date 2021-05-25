<?php

include('connect.php');


$stmt = $conn->prepare("SELECT * FROM disputes WHERE approval='Completed'");
$stmt->execute(); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);


return $stmt->fetchAll();

