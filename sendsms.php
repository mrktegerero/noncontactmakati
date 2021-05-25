<?php 

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
			$ch = curl_init();
			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
			curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			 curl_setopt($ch, CURLOPT_POSTFIELDS, 
			          http_build_query($itexmo));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			return curl_exec ($ch);
			curl_close ($ch);
}
//##########################################################################

if($_POST){
    $number = $_POST['number'];
    $name = $_POST['name'];
    $msg = $_POST['msg'];
    $api  = "TR-KURTR756565_FDWP5";
    $pass = "bj&w26we3&";
    $text = $name.":".$msg;

    if (!empty($_POST['name']) && ($_POST['number']) && ($_POST['msg'])){
    $result = itexmo($number,$text,$api,$pass);
        if ($result == ""){
        echo "iTexMo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        Please CONTACT US for help. ";	
        }else if ($result == 0){
        echo "Message Sent!";
        }
        else{	
        echo "Error Num ". $result . " was encountered!";
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SMS Module</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <form action="sendsms.php" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" maxlength="30" class="form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Recipient's Number</label>
                        <input type="text" maxlength="11" class="form-control" id="number" placeholder="Mobile Number" name="number" required>
                    </div>
                    <div class="form-group">
                        <label for="msg">Your Message</label>
                        <textarea class="form-control" name="msg" placeholder="Message here" onkeyup="countChar(this)" rows="7" required></textarea>
                    </div>
                    <p class="text-right" id="charNum" >200</p>
                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        function countChar(val) {
            var len = val.value.length;
            if(len >= 200) {
                val.value = val.value.substring(0,200);
            }else{
                $('#charNum').text(200 - len);
            }
        };
    </script>

  </body>
</html>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send SMS Message</h4>
      </div>
      <form action="users-add.php" method="POST">
      <div class="modal-body">
    
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" maxlength="40" class="form-control" id="name" name="name" required value="TMO of Makati">
                    </div>
                    <div class="form-group">
                        <label for="number">Recipient's Number</label>
                        <input type="text" maxlength="11"  class="form-control" id="number" name="number" required >
                    </div>
                    <div class="form-group">
                        <label for="msg">Your Message</label>
                        <textarea class="form-control" id="msg" name="msg" rows="7" required></textarea>
                    </div>
               
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>
