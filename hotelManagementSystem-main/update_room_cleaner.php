<?php
	include("conn.php");
	$sql = "UPDATE employee SET 
	employee_name ='$_POST[employee_name]', 
	employee_password='$_POST[employee_password]', 
	employee_phone_no='$_POST[employee_phone_no]', 
	employee_email='$_POST[employee_email]', 
	employee_address='$_POST[employee_address]'
	

	WHERE employee_id ='$_POST[employee_id]';";

	if (mysqli_query($conn, $sql)) {
	mysqli_close($conn);
	echo "<script>alert('Record updated!');
	</script>";
	header('Location:room_cleaner_home.php');
	}
?> 	