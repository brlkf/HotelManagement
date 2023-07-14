<?php
session_start();
if (!isset($_SESSION['mySession']))
{
header("location: cus_log_in.php");
}
?>