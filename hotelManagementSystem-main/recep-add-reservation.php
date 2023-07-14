<?php
function addBookingCart(){
    include ("conn.php");
    $booking_id =getBookingID();
    $customer_id= getCustomerId();
    $room_id =$_POST['room_id'];
    $sql2="INSERT INTO booking_cart (customer_id, booking_id)
        VALUES ('$customer_id', '$booking_id')";
        $result2=mysqli_query($conn,$sql2);
        if (!$result2) {
          die('Error: ' . mysqli_error($conn));
        }
        else{
            $sql = "UPDATE room SET 
            room_availability = '0' 
            WHERE room_id='$room_id';
            ";
            echo $sql;
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                die('Error: ' . mysqli_error($conn));
            }
            else{
                    mysqli_close($conn);
                    echo '<script>location.href = "recep-new-payment.php?customer_id='.$customer_id.'&room_id='.$room_id.'&booking_id='.$booking_id.'";</script>';
                }
        }  
}
function getBookingID(){
    include ("conn.php");
    $room_id =$_POST['room_id'];
    
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $current_time = date('H:i:s');
    $sql = "INSERT INTO booking (room_id, booking_start_date,booking_end_date, booking_start_time, booking_status)
    VALUES ('$room_id', '$_POST[booking_start_date]', '$_POST[booking_end_date]', '$current_time', '0')";
    if (!mysqli_query($conn,$sql)) {
        die('Error: ' . mysqli_error($conn));
    }
    else{
        $last_id = $conn->insert_id;
        return ($last_id);
        }
}

function getCustomerId(){
    include ("conn.php");
    $customer_name = $_POST['customer_name'];
    $query = "SELECT * FROM registered_customer WHERE customer_name = '$customer_name'";
    $finding_result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($finding_result)){
        $customer_id = $row['customer_id'];
        return $customer_id;
    }
}
addBookingCart();
?>
