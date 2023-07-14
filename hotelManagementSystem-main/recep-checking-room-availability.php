<?php
include ("conn.php");
    $room_type = $_POST['room_option'];
    $query = "SELECT * FROM room where room_type = '$room_type';";
    
    $finding_result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($finding_result)){
            if ($row['room_availability'] ==0 or $row['room_status'] == 0)
            {   
                continue;
                
            }
            if ($row['room_availability'] ==1 and $row['room_status'] == 1)
        {
            $room_id =$row['room_id'];
            echo $row['room_id'] ; 
            mysqli_close($conn);
            echo '<script>location.href = "recep-new-reservation.php?room_id='.$room_id.'";</script>';
                break;
           
        }
        else{
            echo '<script>alert("No room is available !");
            window.history.go(-1);
            </script>';
        }
            }
    
       
            
        
?>