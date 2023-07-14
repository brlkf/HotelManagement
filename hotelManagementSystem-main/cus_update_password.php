<?php
	if(isset($_POST["submit"])){
		include("conn.php");

	$sql = "UPDATE registered_customer SET 
	customer_password='$_POST[password]'

	WHERE customer_email='$_POST[email]';";

    echo $sql;

	if (mysqli_query($conn, $sql)) {
	mysqli_close($conn);
	echo "<script>alert('Password updated!'); window.location.href='cus_log_in.php';</script>";
	}
}
?>