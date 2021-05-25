<?php

include('connect.php');


$stmt = $conn->prepare("SELECT * FROM users ORDER BY dates DESC");
$stmt->execute(); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);


return $stmt->fetchAll();

