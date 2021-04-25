<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	//$connection	=	mysqli_connect('localhost', 'root', '', 'gcms_db');



	if (isset($_GET['code'])) {
		$verification_code = mysqli_real_escape_string($connection, $_GET['code']);
		$query	=	"SELECT * FROM user WHERE verification_code	=	'{$verification_code}'";
		$result	=	mysqli_query($connection, $query);

		if (mysqli_num_rows($result) ==1) {
			$query =	"UPDATE user SET active_status1	=true, verification_code = NULL WHERE verification_code	='{$verification_code}' LIMIT 1";

				$result	=	mysqli_query($connection, $query);
				
			if (mysqli_affected_rows($connection) ==1) {
			echo 'Email address verified successfully.';
				}else{
				echo 'Invalid verification code.';
				}
			}
		}
 ?>