<?php 
session_start();
	$mysqli = mysqli_connect("localhost", "root", "", "forum");
	mysqli_select_db($mysqli, "forum");
?>