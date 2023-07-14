<?php
include ("conn.php");
    $room_type= $_POST['room_type']; 
    $price_per_night = $_POST['price_per_night'];
   
    $sql="INSERT INTO room (room_type,price_per_night,room_availability,room_status)
        VALUES ('$room_type','$price_per_night','1','1')";
        $result=mysqli_query($conn,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($conn));
        }
        else{
            
                    mysqli_close($conn);
                    echo '<script>alert("Payment is done succeessfully !");
                    </script>';
                    header('Location: recep-room.php');
                }
        
        
    ?>