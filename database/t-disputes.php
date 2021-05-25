<?php

include('connect.php');


$stmt = $conn->prepare("SELECT * FROM disputes ORDER BY dates ASC");
$stmt->execute(); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);


return $stmt->fetchAll();

