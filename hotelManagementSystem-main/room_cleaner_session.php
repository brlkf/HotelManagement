<?php
session_start();
if (!isset($_SESSION['mySession']))
{
header("location: room_cleaner (login).php");
}
?>