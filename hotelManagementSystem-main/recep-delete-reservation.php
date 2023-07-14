<?php
include("conn.php");
//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$id =$_GET['id'];
$sql ="DELETE FROM booking WHERE booking_id=$id";
//echo $sql;

$result = mysqli_query($conn,$sql);
mysqli_close($conn); //close database connection
header('Location: recep-reservation.php'); //redirect the page to view.php page

?>