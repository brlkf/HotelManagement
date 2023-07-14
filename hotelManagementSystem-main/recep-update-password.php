<?php
	include("conn.php");

	$sql = "UPDATE employee SET 
	 
	employee_password='$_POST[employee_password]'

	WHERE employee_email='$_POST[employee_email]';";
    echo $sql;

	if (mysqli_query($conn, $sql)) {
	mysqli_close($conn);
	echo "<script>alert('Record updated!'); window.location.href='recep-login.php';</script>";
	}

?>