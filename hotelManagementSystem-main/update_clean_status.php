<?php
include("conn.php");
$id =$_GET['id'];
$sql = "UPDATE room SET 
room_status= '1'
WHERE room_id=$id;";
//echo $sql;
$result = mysqli_query($conn,$sql);
if ($result) {
    mysqli_close($conn);
    echo $sql;
header('Location: View_Schedule_room_cleaner.php');
}
?>