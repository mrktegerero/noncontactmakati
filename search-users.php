<?php

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number, $message, $apicode, $passwd)
{
    $ch = curl_init();
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    curl_setopt($ch, CURLOPT_URL, "https://www.itexmo.com/php_api/api.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        http_build_query($itexmo)
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($ch);
    curl_close($ch);
}
//##########################################################################


if ($_POST) {

    $number = $_POST['number'];
    $name = $_POST['name'];
    $msg = $_POST['msg'];
    $api  = "TR-KURTR756565_FDWP5";
    $pass = "bj&w26we3&";
    $text = $name . ":" . $msg;

    if (!empty($_POST['name']) && ($_POST['number']) && ($_POST['msg'])) {
        $result = itexmo($number, $text, $api, $pass);

        if ($result == "") {
            echo "<script> alert('iTexMo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        Please CONTACT US for help.'); </script>";
        } else if ($result == 0) {
            echo "<script> alert('Message Sent Successfully'); window.location.href = 'users-add.php';</script>";
        } else {
            echo "<script> alert('Error Num " . $result . " was encountered!'); window.location.href = 'users-add.php'; </script>";
        }
    }
}
