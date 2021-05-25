<?php
include "conn.php";
 
$violationno = $_POST['violationno'];
 
$sql = "select * from users where id=".$violationno;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<table border='0' width='100%'>
<tr>
    <td width="300"><img src="images/<?php echo $row['files']; ?>">
    <td style="padding:20px;">
    <p>Plate Number : <?php echo $row['platenumber']; ?></p>
    <p>Clearance : <?php echo $row['clearance']; ?></p>
    <p>Date & Time : <?php echo date('M d,Y @ h:i:s A', strtotime($row['paystime'])); ?></p>
    </td>
</tr>
</table>
 
<?php } ?>

