<?php
	ob_start();
	session_start();
	error_reporting(E_ALL & ~E_NOTICE)
	$timezone = date_default_timezone_set("Asia/Kolkata");

	const DB_HOSTNAME = "localhost";
	const DB_USERNAME = "root";
	const DB_PASSWORD = "";
	const DB_NAME = "db";

	// database connection object
	$conn = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if (mysqli_connect_errno()) {
		die( "Failed to connect: " . mysqli_connect_errno() );
	}
?>