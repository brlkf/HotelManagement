<?php
	include("conn.php");
	//$_GET[‘id’] — Get the integer value from id parameter in URL.
	//intval() will returns the integer value of a variable
	$id = intval($_GET['id']);
	$result = mysqli_query($conn,"DELETE FROM employee WHERE employee_id=$id");
	mysqli_close($conn); //close database connection
	header('Location: staff.php'); 
?>