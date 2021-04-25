<?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'gcms_db'; 

	$connection = mysqli_connect('localhost', 'root', '', 'gcms_db');

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	
	}

?>