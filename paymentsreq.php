<?php 
    session_start();
    if(!isset($_SESSION['admin'])) header('location: adminpass.php');
    if(!isset($_SESSION['admin'])) header('location: login.php');
    $_SESSION['table'] = 'uses';
    $admin = ($_SESSION['admin']);
    $users = include('database/show-users.php');

    $payments = include('database/t-payments.php');
    
    
if(isset($_POST['search']))
{
    date_default_timezone_set('Asia/Manila');
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`files`, `platenumber`, `paystime`, 'clearance') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM users WHERE files IS NOT NULL ORDER BY paystime DESC";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "inventory");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Non-Contact</title>

    <link rel="icon" href="assets/img/icon.png" type="image/gif" sizes="18x18"> 
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" rel="stylesheet">
   <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--Our own stylesheet-->
    <link rel="stylesheet" href="assets/css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" />
   
</head>
<body>
    <div class="" id="dashboardMainContainer">
       <?php include('partials/app-sidebar.php')?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/app-topnav.php')?>
            <div class="dashboard_content">
            <div class="dashboard_content_main">
                <div class="rows">
                    
                    <div class="columns column-8">
                        <h1 class="section_header"><i class="fa fa-list"></i> List of Payments Receipt</h1>
                        <div class="section_content">
                            <div class="users">
                                <p class="userCount"><?= count($payments) ?> Receipt Payments</p>

                                <form action="paymentsreq.php" method="post">
                                <input type="text" class="searchBar2" name="valueToSearch" placeholder="Search">
                                <button type="submit" name="search" value="search" class="searchBtn"><i class="fa fa-search"></i> Search</button><br><br>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Violation No.</th>
                                            <th>Plate Number</th>
                                            <!--<th>Payment Receipt</th>-->
                                            <th>Date & Time Settled</th>
                                            <th>Clearance</th>
                                            <th>Action</th>
                                            <th>Payment Receipt</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                    <?php while($row = mysqli_fetch_array($search_result)):?>
                                                <tr>
                                                    <td><?php echo $row['violationno'];?></td>
                                                    <td class="plateNumber"><?php echo $row['platenumber'];?></td>
                                                    <td class="filesType"><?php echo '<img src="receipt/'.$row['files'].'" width="550px" height="930px;" alt="">';?></td>
                                                    <td class="timeType"><?php echo date('M d,Y @ h:i:s A', strtotime($row['paystime']));?></td>
                                                    <td class="clearanceType"><?php echo $row['clearance'];?></td>
                                                    <td><button type="button" class="btn btn-primary updateUser"  data-violationno="<?= $row['violationno'] ?> data-toggle="modal" data-target="#exampleModal">Update</button></td>
                                                    <td><button data-violationno="<?= $row['violationno'] ?>" class="userinfo btn btn-success"> View Receipt</button></td>
                                                </tr>
                                                <?php endwhile;?>
                                    </tbody>
                                </table>
                                </form>
                                <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">User Info</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div> 
            </div>
        </div>
    </div>

           <!-- MAIN JS -->
           <script src='assets/js/scripts.js?v=<?php echo time(); ?>'></script>
      <script src='assets/js/jquery/jquery-3.5.1.min.js'></script>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous"></script>   
      <script>
          function script(){


                this.initialize = function(){
                    this.registerEvents();
                },


                this.registerEvents = function(){
                    document.addEventListener('click', function(e){
                        targetElement = e.target;
                        classList = e.target.classList;

                        if(classList.contains('updateUser')){
                            e.preventDefault();
                            //get data

                      
                            clearanceType = targetElement.closest('tr').querySelector('td.clearanceType').innerHTML;
                            plateNumber = targetElement.closest('tr').querySelector('td.plateNumber').innerHTML;
                            timeType = targetElement.closest('tr').querySelector('td.timeType').innerHTML;
                            violationNo = targetElement.dataset.violationno;

                            BootstrapDialog.confirm({
                                title: 'Payment Receipt for Violation no. ' + plateNumber,
                                message: '<form>\
                                    <div class="form-group">\
                                        <label for ="clearanceType">Clearance:</label>\
                                        <select name="clearance" id="clearanceType" class="form-control" value="'+ clearanceType +'">\
                                                <option value="Not yet Settled">Not yet Settled</option>\
                                                <option value="Settled">Settled</option>\
                                            </select>\
                                    </div>\
                                    <div class="form-group time-none">\
                                        <label for ="timeType">Date:</label>\
                                        <input type="datetime-local" readonly="readonly" class="form-control" id="timeType"\
                                    </div>\
                                    </form>',
                                    callback: function(isUpdate){
                                        if(isUpdate){ //click 'Ok' button
                                            $.ajax({
                                                method:'POST',
                                                data: {
                                                    violation_no: violationNo,
                                                    clearance_type: document.getElementById('clearanceType').value,
                                                    time_type: document.getElementById('timeType').value
                                                },
                                                url: 'database/update-payments.php',
                                                dataType: 'json',
                                                success: function(data){
                                                    if(data.success){
                                                        if(window.confirm(data.message)){
                                                            location.reload();
                                                        }                      
                                                    }else 
                                                        BootstrapDialog.alert({
                                                            type: BootstrapDialog.TYPE_DANGER,
                                                            message: data.message,
                                                        });                                      
                                                }
                                            });
                                        }
                                    }
                            });


                        }
                       
                    });
                }
          }

          var script = new script;
          script.initialize();

     
      </script>
 <script>
          function script(){


                this.initialize = function(){
                    this.registerEvents();
                },


                this.registerEvents = function(){
                    document.addEventListener('click', function(e){
                        targetElement = e.target;
                        classList = e.target.classList;

                        if(classList.contains('userinfo')){
                            e.preventDefault();
                            //get data

                      
                            clearanceType = targetElement.closest('tr').querySelector('td.clearanceType').innerHTML;
                            plateNumber = targetElement.closest('tr').querySelector('td.plateNumber').innerHTML;
                            filesType = targetElement.closest('tr').querySelector('td.filesType').innerHTML;
                            timeType = targetElement.closest('tr').querySelector('td.timeType').innerHTML;
                            violationNo = targetElement.dataset.violationno;

                            BootstrapDialog.show({
                                title: 'Update Violation no. ' + plateNumber,
                                message: '<table border="0" width="100%">\
                                    <tr>\
                                        <td width="300"> '+ filesType +' \
                                        </td>\
                                    </tr>\
                                    </table>',
                                    callback: function(isUpdate){
                                        if(isUpdate){ //click 'Ok' button
                                            $.ajax({
                                                url: 'database/viewimage.php',
                                                type: 'post',
                                                data: {violtionno: violtionno},
                                                success: function(response){ 
                                                    $('.modal-body').html(response); 
                                                    $('#empModal').modal('show');                                   
                                                }
                                            });
                                        }
                                    }
                            });


                        }
                       
                    });
                }
          }

          var script = new script;
          script.initialize();

     
      </script>

</body>
    </html>
