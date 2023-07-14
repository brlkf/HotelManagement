<?php
include("conn.php");
$id =$_GET['id'];
date_default_timezone_set('Asia/Kuala_Lumpur');
$current_time = date('H:i:s');
$sql = "UPDATE booking SET 
booking_start_time='$current_time'
WHERE booking_id=$id;";
//echo $sql;
$result = mysqli_query($conn,$sql);
if ($result) {
    mysqli_close($conn);
    echo $sql;
header('Location: recep-reservation.php');
}
?>