<?php
            
include("conn.php");
$sql = "INSERT INTO registered_customer (customer_name, 
customer_password,customer_nationality, customer_phone_no, 
customer_email, ic_no, passport_no)
VALUE ('$_POST[username]','$_POST[password]','$_POST[nationality]',
'$_POST[phone_no]','$_POST[email]','$_POST[ic_no]','$_POST[passport_no]')";

$result=mysqli_query($conn,$sql);
if (!$result) {
    die('Error: ' . mysqli_error($conn));
    }
    else{      
        mysqli_close($conn);
        echo "<script>alert('Successfully Signed Up!'); window.location.href='cus_log_in.php';</script>";
    }
?>