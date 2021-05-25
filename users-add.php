<?php
session_start();
if (!isset($_SESSION['admin'])) header('location: adminpass.php');
if (!isset($_SESSION['admin'])) header('location: login.php');


$_SESSION['table'] = 'users';
$admin = ($_SESSION['admin']);
$users = include('database/show-users.php');



if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`violationno`, `platenumber`, `vehicle`, `fullname`, `num`, `violation`, `clearance`, `dates`, 'times', `price`, `pincode`) LIKE '%" . $valueToSearch . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `users` ORDER BY dates DESC, times DESC";
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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--Our own stylesheet-->
    <link rel="stylesheet" href="assets/css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" />

</head>

<body>
    <div class="" id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="rows">
                        <div class="columns column-5">
                            <h1 class="section_header"><i class="fa fa-plus"></i> Insert Violation</h1>
                            <div id="userAddFormContainer">

                                <label for="fullname">*REQUIRED</label>
                                <?php
                                if (isset($_SESSION['response'])) {
                                    $response_message = $_SESSION['response']['message'];
                                    $is_success = $_SESSION['response']['success'];
                                ?>
                                    <div class="responseMessage">
                                        <p class="<?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                            <?= $response_message ?>
                                        </p>
                                    </div>
                                <?php unset($_SESSION['response']);
                                } ?>

                                <form action="database/add.php" method="post" enctype="multipart/form-data" class="appForm">
                                    <div class="appFormInputContainer">
                                        <label for="platenumber">Plate Number*</label>
                                        <input type="text" class="appFormInput" id="platenumber" name="platenumber" oninput="this.value = this.value.toUpperCase()" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="vehicle">Type of Vehicle*</label>
                                        <input type="text" class="appFormInput" id="vehicle" name="vehicle" oninput="this.value = this.value.toUpperCase()" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="fullname">Name*(Lastname, Firstname)</label>
                                        <input type="text" class="appFormInput" id="fullname" name="fullname" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="num">Mobile Number*</label>
                                        <input type="number" class="appFormInput" id="num" name="num" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="violation">Violation*</label>
                                        <input type="text" class="appFormInput" id="violation" name="violation" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="clearance">Clearance*: </label>
                                        <select name="clearance" id="clearance" class="appFormInput" required>
                                            <option value="Not yet Settled">Not yet Settled</option>
                                            <option value="Settled">Settled</option>
                                        </select>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="dates">Date Violated*</label>
                                        <input type="date" class="appFormInput" id="dates" name="dates" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="times">Time Violated*</label>
                                        <input type="time" class="appFormInput" id="times" name="times" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="price">Amount*</label>
                                        <input type="number" class="appFormInput" id="price" name="price" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="violationfile">Select image:</label>
                                        <input type="file" class="appFormIn" id="violationfile" name="violationfile" accept="image/*" required>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="pincode">Pin Code*</label>
                                        <input type="text" class="appFormInput" id="pincode" readonly="readonly" name="pincode" minlength="6" maxlength="6" required>
                                        <input type="button" class="pincode_btn" value="Generate Pin Code" onclick="randomStringToInput(this)"></td>
                                    </div>
                                    <button type="submit" name="submit" class="appBtn"><i class="fa fa-plus"></i> Add Violation</button>
                                </form>


                            </div>
                        </div>

                        <div class="columns column-7">
                            <h1 class="section_header"><i class="fa fa-list"></i> List of Violations</h1>
                            <div class="section_content">
                                <div class="users">
                                    <p class="userCount"><?= count($users) ?> Users</p>

                                    <form action="users-add.php" method="post">
                                        <input type="text" class="searchBar2" name="valueToSearch" placeholder="Search">
                                        <button type="submit" name="search" value="search" class="searchBtn"><i class="fa fa-search"></i> Search</button><br><br>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Violation No.</th>
                                                    <th>Plate No.</th>
                                                    <th>Vehicle</th>
                                                    <th>Full Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Violation</th>
                                                    <th>Clearance</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Amount</th>
                                                    <!--<th>Image</th>-->
                                                    <th>Pin Code</th>
                                                    <th>Action</th>
                                                    <th>SMS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_array($search_result)) : ?>
                                                    <tr>
                                                        <td><?php echo $row['violationno']; ?></td>
                                                        <td class="plateNumber"><?php echo $row['platenumber']; ?></td>
                                                        <td class="vehicleType"><?php echo $row['vehicle']; ?></td>
                                                        <td class="fullName"><?php echo $row['fullname']; ?></td>
                                                        <td class="mobileNumber">0<?php echo $row['num']; ?></td>
                                                        <td class="violationType"><?php echo $row['violation']; ?></td>
                                                        <td class="clearanceType"><?php echo $row['clearance']; ?></td>
                                                        <td class="datesType"><?php echo $row['dates']; ?></td>
                                                        <td class="timesType"><?php echo $row['times']; ?></td>
                                                        <td class="priceType"><?php echo $row['price']; ?></td>
                                                        <!-- <td ><?php echo '<img src="upload/' . $row['violationfile'] . '" width="100px" height="100px;" alt="">' ?> </td> -->
                                                        <td class="pinCode"><?php echo $row['pincode']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary updateUser" data-violationno="<?= $row['violationno'] ?> data-toggle=" modal" data-target="#exampleModal">Update</button>
                                                        </td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-success editbtn" data-toggle="modal" data-target="#exampleModal">SMS</button>

                                                            <!-- Modal -->
                                                        
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                                
                                            </tbody>
                                        </table>
                                    </form>
                                    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="viono"> Send SMS Message</h5>

                                                                        </div>
                                                                        <form action="search-users.php" method="POST">
                                                                            <div class="modal-body">

                                                                                <div class="form-group">
                                                                                    <label for="name">Your Name</label>
                                                                                    <input type="text" maxlength="40" class="form-control" id="name" name="name" required value="TMO of Makati">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="number">Recipient's Number</label>
                                                                                    <input type="text" maxlength="11" class="form-control" id="number" name="number" required>
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
        function script() {


            this.initialize = function() {
                    this.registerEvents();
                },


                this.registerEvents = function() {
                    document.addEventListener('click', function(e) {
                        targetElement = e.target;
                        classList = e.target.classList;


                        if (classList.contains('deleteUser')) {
                            e.preventDefault();
                            violationNo = targetElement.dataset.violationno;
                            plateNo = targetElement.dataset.platenumber;
                            fullName = targetElement.dataset.fullname;

                            if (window.confirm('Are you sure to delete Plate No: ' + plateNo + '?')) {
                                $.ajax({
                                    method: 'POST',
                                    data: {
                                        violation_no: violationNo,
                                        plate_no: plateNo,
                                        full_name: fullName
                                    },
                                    url: 'database/delete-user.php',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data.success) {
                                            if (window.confirm(data.message)) {
                                                location.reload();
                                            }
                                        } else window.alert(data.message);
                                    }
                                })
                            } else {
                                console.log('Will not delete')
                            }
                        }

                        if (classList.contains('updateUser')) {
                            e.preventDefault();
                            //get data

                            plateNumber = targetElement.closest('tr').querySelector('td.plateNumber').innerHTML;
                            vehicleType = targetElement.closest('tr').querySelector('td.vehicleType').innerHTML;
                            fullName = targetElement.closest('tr').querySelector('td.fullName').innerHTML;
                            mobileNumber = targetElement.closest('tr').querySelector('td.mobileNumber').innerHTML;
                            violationType = targetElement.closest('tr').querySelector('td.violationType').innerHTML;
                            clearanceType = targetElement.closest('tr').querySelector('td.clearanceType').innerHTML;
                            datesType = targetElement.closest('tr').querySelector('td.datesType').innerHTML;
                            timesType = targetElement.closest('tr').querySelector('td.timesType').innerHTML;
                            priceType = targetElement.closest('tr').querySelector('td.priceType').innerHTML;
                            pinCode = targetElement.closest('tr').querySelector('td.pinCode').innerHTML;
                            violationNo = targetElement.dataset.violationno;

                            BootstrapDialog.confirm({
                                title: 'Update ' + plateNumber + ' ' + vehicleType,
                                message: '<form>\
                                    <div class="form-group">\
                                        <label for ="plateNumber">Plate Number:</label>\
                                        <input type ="plateNumber" class="form-control" id="plateNumber" value="' + plateNumber + '">\
                                    </div>\
                                    <div class="form-group">\
                                        <label for ="vehicleType">Vehicle Type:</label>\
                                        <input type ="vehicleType" class="form-control" id="vehicleType" value="' + vehicleType + '">\
                                    </div>\
                                    <div class="form-group">\
                                        <label for ="fullName">Full Name:</label>\
                                        <input type ="fullName" class="form-control" id="fullName" value="' + fullName + '">\
                                    </div>\
                                    <div class="form-group">\
                                        <label for ="mobileNumber">Mobile Number:</label>\
                                        <input type ="mobileNumber" class="form-control" id="mobileNumber" value="' + mobileNumber + '">\
                                    </div>\
                                    <div class="form-group">\
                                        <label for ="violationType">Violation:</label>\
                                        <input type ="violationType" class="form-control" id="violationType" value="' + violationType + '">\
                                    </div>\
                                    <div class="form-group">\
                                        <label for ="clearanceType">Clearance:</label>\
                                        <select name="clearance" id="clearanceType" class="form-control" value="' + clearanceType + '">\
                                                <option value="Not yet Settled">Not yet Settled</option>\
                                                <option value="Settled">Settled</option>\
                                            </select>\
                                    </div>\
                                    <div class="form-group">\
                                        <label for ="datesType">Date:</label>\
                                        <input type="date" class="form-control" id="datesType" value="' + datesType + '">\
                                    </div>\
                                    <div class="appFormInputContainer">\
                                        <label for="timesType">Time Violated:</label>\
                                        <input type="time" class="appFormInput" id="timesType" value="' + timesType + '"> \
                                    </div>\
                                    <div class="form-group">\
                                        <label for ="priceType">Amount: </label>\
                                        <input type ="priceType" class="form-control" id="priceType" value="' + priceType + '">\
                                    </div>\
                                    <div class="form-group">\
                                        <label for ="pinCode">Pin Code:</label>\
                                        <input type ="pinCode" class="form-control" readonly="readonly" id="pinCode" maxlength="8" minlength="8" value="' + pinCode + '">\
                                    </div>\
                                    </form>',
                                callback: function(isUpdate) {
                                    if (isUpdate) { //click 'Ok' button
                                        $.ajax({
                                            method: 'POST',
                                            data: {
                                                violation_no: violationNo,
                                                plate_no: document.getElementById('plateNumber').value,
                                                vehicle_type: document.getElementById('vehicleType').value,
                                                full_name: document.getElementById('fullName').value,
                                                mobile_number: document.getElementById('mobileNumber').value,
                                                violation_type: document.getElementById('violationType').value,
                                                clearance_type: document.getElementById('clearanceType').value,
                                                dates_type: document.getElementById('datesType').value,
                                                times_type: document.getElementById('timesType').value,
                                                price_type: document.getElementById('priceType').value,
                                                pin_code: document.getElementById('pinCode').value
                                            },
                                            url: 'database/update-user.php',
                                            dataType: 'json',
                                            success: function(data) {


                                                if (data.success) {
                                                    if (window.confirm(data.message)) {
                                                        location.reload();
                                                    }
                                                } else
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
        function randomStringToInput(clicked_element) {
            var self = $(clicked_element);
            var random_string = generateRandomString(5);
            $('input[name=pincode]').val(random_string);
            self.remove();
        }

        function generateRandomString(string_length) {
            var characters = '0123456789';
            var string = '';

            for (var i = 0; i <= string_length; i++) {
                var rand = Math.round(Math.random() * (characters.length - 1));
                var character = characters.substr(rand, 1);
                string = string + character;
            }

            return string;
        }
    </script>


    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');


                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#viono').val("Send SMS in violation no: " + data[0]);
                $('#number').val(data[4]);
                $('#msg').val("You can view your violation at noncontactmakati.com with a pin code of: " + data[10]);





            });
        });
    </script>
</body>

</html>