
<?php
	include("conn.php");
	//$_GET[‘id’] — Get the integer value from id parameter in URL.
	//intval() will returns the integer value of a variable
	$id = intval($_GET['id']);
	$result = mysqli_query($conn,"SELECT * FROM schedule WHERE schedule_id=$id");
	while($row = mysqli_fetch_array($result))
	{
		$employeeid = $row["employee_id"];
	}
	$result1 = mysqli_query($conn,"DELETE FROM schedule WHERE schedule_id=$id");
	mysqli_close($conn); //close database connection
	header("Location: edit_schedule.php?id=$employeeid"); 
?>