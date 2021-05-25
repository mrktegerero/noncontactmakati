<?php

include('connect.php');


$stmt = $conn->prepare("SELECT * FROM users WHERE files IS NOT NULL");
$stmt->execute(); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);


return $stmt->fetchAll();

