<?php
	session_start();
	$hostname_conn = "localhost";
	$database_conn = "abeevaluation_db";
	$username_conn = "root";
	$password_conn = "";
	$conn = mysqli_connect($hostname_conn, $username_conn, $password_conn,$database_conn) or trigger_error(mysqli_error()); 
?>