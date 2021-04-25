<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 

//checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
			header('Location: login.php');
		
	}

 ?>


<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

 		 <style type="text/css">
 			#body{
 			background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
 				}

 				html{
  				height: 100%;
				}
			body{
  				min-height: 100%;
				}

 		</style>
 	
</head>

<body  id="body">

<div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Welcome <?php echo $_SESSION['u_first_name']; ?>!</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Home.html">Home</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="personalbin.php">Personal Bin</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Complain</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Profile Details</a>
        </li>

      </ul>
      
     
     <ul class="navbar-nav m-2">
      
      <li class="'nav-item">
        <a class="nav-link bg-primary rounded text-light" aria-current="page" href="logout.php">Log Out</a>
      </li>
     </ul> 


    </div>
  </div>

</nav>
</div>

</body>
</html>
<?php mysqli_close($connection); ?>