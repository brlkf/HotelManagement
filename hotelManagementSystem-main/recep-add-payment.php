<?php
function addPayment(){
    include ("conn.php");
    $booking_cart_id= getBookingCartId(); 
    $customer_id = $_POST['customer_id'];
    $amount= $_POST['amount_paid'];
    $discount = $_POST['discount'];
    $point = $amount * 0.1;
    $sql="INSERT INTO payment (booking_cart_id,amount,discount_applied,point_get)
        VALUES ('$booking_cart_id','$amount','$discount','$point')";
        $result=mysqli_query($conn,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($conn));
        }
        else{
            $query ="SELECT * FROM registered_customer WHERE customer_id = $customer_id" ;
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result)){
            $newAmount = $row['point'] + $point;
            $update = "UPDATE registered_customer SET point = $newAmount WHERE customer_id=$customer_id;";
            $result = mysqli_query($conn,$update);
            if (!$result) {
                die('Error: ' . mysqli_error($conn));
            }
            else{
                    mysqli_close($conn);
                    echo '<script>alert("Payment is done succeessfully !");
                    </script>';
                    header('Location: recep-reservation.php');
                }
        }
        }
}


function getBookingCartID(){
    include ("conn.php");
    $booking_id = $_POST['booking_id'];
    $query = "SELECT * FROM booking_cart where booking_id = '$booking_id';";
    $checking_result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($checking_result)){
        $booking_cart_id = $row['booking_cart_id'];
        return $booking_cart_id;
    }
}

addPayment();
?>