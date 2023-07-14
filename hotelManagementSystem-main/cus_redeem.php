<?php
    include "cus_session.php";
	include "conn.php";
    $name= $_SESSION['mySession'];

    $query ="SELECT * FROM registered_customer WHERE customer_password = '$name'" ;
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
    $newAmount = $row['point'] -100;}
    
	$sql = "UPDATE registered_customer SET 
	point = $newAmount

	WHERE customer_password='$name';";
    echo $sql;

	if (mysqli_query($conn, $sql)) {
	mysqli_close($conn);
	echo "<script>alert('Redeem Successfully!Please check your email'); window.location.href='cus_points.php';</script>";
	}

?>