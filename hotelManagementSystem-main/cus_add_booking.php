<?php
function addBookingCart(){
    include "cus_session.php";
    include ("conn.php");
    $booking_id =getBookingID();
    $name=$_SESSION['mySession'];
    $room_id =$_POST['room_id'];
    $total=$_POST['total'];
    $query ="SELECT * FROM registered_customer WHERE customer_password = '$name'" ;
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
    $customer_id = $row['customer_id'];}
    $sql2="INSERT INTO booking_cart (customer_id, booking_id)
        VALUES ('$customer_id', '$booking_id')";
        $result2=mysqli_query($conn,$sql2);
        if (!$result2) {
          die('Error: ' . mysqli_error($conn));
        }
        else{       mysqli_close($conn);
                    echo '<script>location.href = "cus_payment.php?total='.$total.'&booking_id='.$booking_id.'";</script>';
                }
        }  
function getBookingID(){
    include ("conn.php");
    $room_id =$_POST['room_id'];   
    $sql = "INSERT INTO booking (room_id, booking_start_date,booking_end_date, booking_status)
    VALUES ('$room_id', '$_POST[booking_start_date]', '$_POST[booking_end_date]','0')";
    if (!mysqli_query($conn,$sql)) {
        die('Error: ' . mysqli_error($conn));
    }
    else{
        $last_id = $conn->insert_id;
        return ($last_id);
        }
}

addBookingCart();
?>