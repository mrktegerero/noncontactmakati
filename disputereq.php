<?php 
    session_start();
    if(!isset($_SESSION['admin'])) header('location: adminpass.php');
    if(!isset($_SESSION['admin'])) header('location: login.php');
    $_SESSION['table'] = 'disputes';
    $admin = ($_SESSION['admin']);
    $users = include('database/show-users.php');

    $disputes = include('database/t-disputes.php');

    
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `disputes` WHERE CONCAT(`disputeno`, `platenumber`, `fullname`, `email`, `contactno`, `dates`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `disputes` ORDER BY dates DESC";
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
                        <h1 class="section_header"><i class="fa fa-list"></i> List of Disputes</h1>
                        <div class="section_content">
                            <div class="users">
                                <p class="userCount"><?= count($disputes) ?> Dispute Request</p>

                                <form action="disputereq.php" method="post">
                                <input type="text" class="searchBar2" name="valueToSearch" placeholder="Search">
                                <button type="submit" name="search" value="search" class="searchBtn"><i class="fa fa-search"></i> Search</button><br><br>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Dispute No.</th>
                                            <th>Plate No.</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Date</th>
                                            <th>Complaints</th>
                                            <th>Approval</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                    <?php while($row = mysqli_fetch_array($search_result)):?>
                                                <tr>
                                                    <td><?php echo $row['disputeno'];?></td>
                                                    <td ><?php echo $row['platenumber'];?></td>
                                                    <td ><?php echo $row['fullname'];?></td>
                                                    <td ><?php echo $row['email'];?></td>
                                                    <td >0<?php echo $row['contactno'];?></td>
                                                    <td ><?php echo date('M d,Y @ h:i:s A', strtotime($row['dates']));?></td>
                                                    <td class="comp"><?php echo $row['subjects'];?></td>
                                                    <td class="approvalType"><?php echo $row['approval'];?></td>
                                                    <td>
                                                <a href="" class="updateUser" data-disputeno="<?= $row['disputeno'] ?>"><i class="fa fa-pencil" ></i> Approval</a>
                                               
                                                    </td>
                                                </tr>
                                                <?php endwhile;?>
                                    </tbody>
                                </table>
                                </form>
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
                            approvalType = targetElement.closest('tr').querySelector('td.approvalType').innerHTML;
                            disputeNo = targetElement.dataset.disputeno;

                            BootstrapDialog.confirm({
                                title: 'Approve dispute equest no: ' + disputeNo + '? ' ,
                                message: '<form>\
                                    <div class="form-group">\
                                        <label for ="approvalType">Approval:</label>\
                                        <select name="approval" id="approvalType" class="form-control" '+ approvalType +'">\
                                                <option value="Pending">Pending</option>\
                                                <option value="Completed">Completed</option>\
                                            </select>\
                                    </div>\
                                    </form>',
                                    callback: function(isUpdate){
                                        if(isUpdate){ //click 'Ok' button
                                            $.ajax({
                                                method:'POST',
                                                data: {
                                                    dispute_no: disputeNo,
                                                    approval_type: document.getElementById('approvalType').value
                                                },
                                          
                                                url: 'database/update-dispute.php',
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
</body>
    </html>
