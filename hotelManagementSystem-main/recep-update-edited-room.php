<?php

    include("conn.php");
    if($_POST['room_availability'] == 1 
    or $_POST['room_availability'] == 0){
    if($_POST['room_status'] == 1 or $_POST['room_status'] == 0){
    $sql = "UPDATE room SET 
    room_id = '$_POST[room_id]',
    room_type='$_POST[room_type]', 
    price_per_night='$_POST[price_per_night]', 
    room_availability='$_POST[room_availability]', 
    room_status='$_POST[room_status]' 
    WHERE room_id='$_POST[room_id]';
    ";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      else{
         
                mysqli_close($conn);
                echo $sql;
                header('Location: recep-room.php');
          
    }
    }
    else{
      echo '<script>alert("Invalid input. Enter [1] for cleaned or [0] for not cleaned!");window.location.href="recep-room.php"</script>';
      
      
    }
    }
    else{
      echo '<script>alert("Invalid input. Enter [1] for available or [0] for unavailable!");window.location.href="recep-room.php"</script>';
      
      
    }