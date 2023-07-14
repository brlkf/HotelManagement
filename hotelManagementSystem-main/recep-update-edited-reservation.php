<?php

    include("conn.php");
    if($_POST['booking_status'] == 1 
    or $_POST['booking_status'] == 0)
    {
    $sql = "UPDATE booking SET 
    room_id = '$_POST[room_id]',
    booking_start_date='$_POST[booking_start_date]', 
    booking_end_date='$_POST[booking_end_date]', 
    booking_start_time='$_POST[booking_start_time]', 
    booking_end_time='$_POST[booking_end_time]' ,
    booking_status='$_POST[booking_status]' 
    WHERE booking_id='$_POST[booking_id]';
    ";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      else
      {
          $sql2="UPDATE booking_cart SET customer_id = '$_POST[customer_id]'
          WHERE booking_id = '$_POST[booking_id]';";
          $result2=mysqli_query($conn,$sql2);
          if (!$result2) {
            die('Error: ' . mysqli_error($conn));
          }
          else
          {
                mysqli_close($conn);
                echo $sql;
                header('Location: recep-reservation.php');
          }
    }
  }
  else
  {
    echo '<script>alert("Invalid input. Enter [1] for complete or [0] for pending!");
    window.location.href="recep-reservation.php"</script>';
  }

