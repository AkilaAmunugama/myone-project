<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
			header('Location: login.php');
		
	}

	$user_list= '';

	//getting the list of
	$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY u_first_name";
	$users = mysqli_query($connection, $query);

	verify_query($users);
		while ($user = mysqli_fetch_assoc($users)) {
			$user_list .= "<tr>";
			$user_list .= "<td>{$user['u_first_name']} </td>";
			$user_list .= "<td>{$user['u_last_name']} </td>";
			$user_list .= "<td>{$user['u_logined_date']} </td>";
			$user_list .=  "<td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
			$user_list .=  "<td><a href=\"delect-user.php?user_id={$user['id']}\">Delect</a></td>";

			$user_list .= "</td>";
		}
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
	<header>
	<div>Wellcome <?php echo $_SESSION['u_first_name']; ?> </div>
	<a href="logout.php">Log Out</a>
	</header>

	<main>
		<h1>Users <span><a href="signup.php"> Add new</a></span></h1>

		<table>
			<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Last Login</th>
			<th>Edit</th>
			<th>Delete</th>
			</tr>

			<?php echo $user_list; ?>
		</table>
	</main>

</body>
</html>
<?php mysqli_close($connection); ?>