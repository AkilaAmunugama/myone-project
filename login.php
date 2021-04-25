<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php 

	//check for form submission
	if(isset($_POST['submit'])){

		$errors = array();

		//check if the username and password has been entered
		if(!isset($_POST['u_nic_no']) || strlen(trim($_POST['u_nic_no'])) < 1){
			$errors[] = 'Username is Missing / Invalid';

		}

		if(!isset($_POST['u_password']) || strlen(trim($_POST['u_password']))< 1){
			$errors[] = 'Password is Missing / Invalid';

		}

		//check if there are any errors in the form
		if(empty($errors)){
			//save username and password intp variables
			$u_nic_no	=	mysqli_real_escape_string($connection, $_POST['u_nic_no']);
			$u_password	=	mysqli_real_escape_string($connection, $_POST['u_password']);
			$hashed_password	=	sha1($u_password);
			
			//prepare database query
			$query	= "SELECT * FROM user WHERE u_nic_no = '{$u_nic_no}'
			AND u_password = '{$hashed_password}' AND active_status1=1 LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			  if($result_set){
				//query succesfful
				if(mysqli_num_rows($result_set) == 1){
					//valid user found
					$user = mysqli_fetch_assoc($result_set);
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['u_first_name'] = $user['u_first_name'];
					$_SESSION['u_nic_no'] = $user['u_nic_no'];
					//redirect to users.php
					header('Location: home.php');
				}else{
					//username and password invalid
					$errors[] = 'Invalid Username / Password';
				}
			}else{
				$errors[] = 'Database query failed';
			}
				
		}

	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>User Login</title>
	 <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

      <style type="text/css">
      	#body{
 			background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
 			background-size: 100% 100%;
 		}

 			
 			html{
  				height: 100%;
				}
			body{
  				min-height: 100%;
				}
 		
 		
      </style>
      

</head>
<body id="body">
	

	<div class="container-fluid col-lg-4 col-md-6 col-sm-12 p-3 align-content-center shadow bg-dark rounded mt-5" style="opacity: 0.8">
	
    <form class="form-container text-light" method="post">
      
      <div class="fs-2 fw-bold text-center m-3">User Login Form</div>

      <div class="text-light">
      	<?php 
      		if(isset($errors) && !empty($errors))
      			echo '<p class="">Invalid Username or Password </p>';
      	?>

      	<?php 
      		if (isset($_GET['logout'])) {
      			echo '<p class="">You have succesffully logged out from the system </p>';
      		}

      	 ?>
      	</div>


            <div class="row mb-3">
               <div class="col-3"><label class="form-label">User Name</label></div>
                <div class="col-8"><input type="text" class="form-control bg-dark text-light border-primary" name="u_nic_no" placeholder="NIC No"></div>
            </div>

            <div class="row mb-3">
              <div class="col-3"><label class="form-label">Password</label></div>
              <div class="col-8"><input type="password" class="form-control bg-dark text-light border-primary" name="u_password" placeholder="Password"></div>
            </div>
            
            <div class="checkbox row mb-3">
              <label>
                <input type="checkbox">Remember me
              </label>
            </div>

            <div class="row  mb-3">
            <div class="align-content-center"><input type="submit" name="submit" class="form-control bg-success text-light mb-2 border-0 p-2" value="Login"></div>
            </div>

            <div class="row mb-2">
            <div class="d-flex align-items-end flex-column"><a href="signup.php" class="btn btn-secondary">Click to Signup</a></div>
            </div>
	</form>

    </div>    	
	
</body>
</html>
<?php mysqli_close($connection); ?>