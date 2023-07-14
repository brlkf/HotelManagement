<?php
include "cus_session.php";     
include("conn.php");
$name=$_SESSION['mySession'];
$query ="SELECT * FROM registered_customer WHERE customer_password = '$name'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
$id = $row['customer_id'];}
$sql = "INSERT INTO feedback (feedback_id,customer_id,
details)
VALUE ('',$id,'$_POST[feedback]')";

$result=mysqli_query($conn,$sql);
if (!$result) {
    die('Error: ' . mysqli_error($conn));
    }
    else{
        
        mysqli_close($conn);
        echo "<script>alert('Feedback Submitted!'); window.location.href='cus_purchase_history.php';</script>";

    }


        ?>