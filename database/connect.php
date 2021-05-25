<?php
    $servername = 'localhost';  
    $username = 'root';
    $password = '';
    


    //connecting database
    try { 
        $conn = new PDO("mysql:host=$servername;dbname=inventory", $username, $password);
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\Exception $e) {
        $congrats_message = $e->getMessage();
        $confirm_message = $e->getMessage();

    }


?> 