<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	$errors = array();

	$u_first_name = '';
	$u_last_name = '';
	$u_email = '';
	$u_password = '';

	if (isset($_POST['submit'])) {


		$u_first_name = $_POST['u_first_name'];
		$u_last_name = $_POST['u_last_name'];
		$u_email = $_POST['u_email'];
		$u_password = $_POST['u_password'];


			//checking max length
			$max_len_fields = array('u_first_name' => 100,'u_last_name' => 100,'u_email' =>100,'u_password' => 40,'u_nic_no' => 12);

			foreach ($max_len_fields as $field => $max_len) {
				if (strlen(trim($_POST[$field])) > $max_len) {
				$errors[] = $field . 'must be less than' . $max_len . 'characters';
				}
			}

			//checking email address
			if(!is_email($_POST['u_email'])){
				$errors[] = 'Email address is invalid.';
			}

			//checking if email address already exists
			$u_email = mysqli_real_escape_string($connection, $_POST['u_email']);
			$query = "SELECT * FROM user WHERE u_email = '{$u_email}' LIMIT 1";

			$result_set	= mysqli_query($connection, $query);

			if ($result_set) {
				if(mysqli_num_rows($result_set) == 1){
					$errors[] = 'Email address already exists'; 
				}
			}


			//checking if  usrname already exists
			$u_nic_no = mysqli_real_escape_string($connection, $_POST['u_nic_no']);
			$query1 = "SELECT * FROM user WHERE u_nic_no = '{$u_nic_no}' LIMIT 1";

			$result_set1	= mysqli_query($connection, $query1);

			if ($result_set1) {
				if(mysqli_num_rows($result_set1) == 1){
					$errors[] = 'NIC No already exists'; 
				}
			}


			if (empty($errors)) {
				// no errors found..adding new record
				$u_first_name = mysqli_real_escape_string($connection, $_POST['u_first_name']);
				$u_last_name = mysqli_real_escape_string($connection, $_POST['u_last_name']);
				$u_nic_no = mysqli_real_escape_string($connection, $_POST['u_nic_no']);
				$u_password = mysqli_real_escape_string($connection, $_POST['u_password']);

				//email address is already sanitized
				$hashed_password = sha1($u_password);
				$u_gender = mysqli_real_escape_string($connection, $_POST['u_gender']);
				$u_division = mysqli_real_escape_string($connection, $_POST['u_division']);
				$u_address_no = mysqli_real_escape_string($connection, $_POST['u_address_no']);
				$u_street = mysqli_real_escape_string($connection, $_POST['u_street']);
				$u_city = mysqli_real_escape_string($connection, $_POST['u_city']);
				$u_contact_no1 = mysqli_real_escape_string($connection, $_POST['u_contact_no1']);
				$u_contact_no2 = mysqli_real_escape_string($connection, $_POST['u_contact_no2']);
				
				


				$verification_code = sha1($u_email . time());
				$verification_URL	=	'http://localhost/ums/verify.php?code='	.	$verification_code;

				$u_latitude = $_POST['newLatId1'];
				$u_longitude = $_POST['newLngId1'];


				
				// Get file info 
        	$fileName = basename($_FILES["image"]["name"]); 
        	$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        		// Get file info 
        	$fileName1 = basename($_FILES["image1"]["name"]); 
        	$fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION);




        	// Allow certain file formats 
       	 $allowTypes = array('jpg','png','jpeg','gif'); 
       	 if(in_array($fileType, $allowTypes)){ 
           	 $image = $_FILES['image']['tmp_name']; 
           	 $imgContent = addslashes(file_get_contents($image));

           	  $allowTypes1 = array('jpg','png','jpeg','gif'); 
       		 if(in_array($fileType1, $allowTypes1)){ 
           	 $image1 = $_FILES['image1']['tmp_name']; 
           	 $imgContent1 = addslashes(file_get_contents($image1)); 


					
				$query = "INSERT INTO user (u_first_name,u_last_name,u_email,u_nic_no,u_password,u_gender,u_division,u_address_no,u_street,u_city,u_contact_no1,u_contact_no2,verification_code,active_status1,active_status2,u_latitude,u_longitude,u_profile_photo,u_nic_passport_driving_licence_photo,is_deleted) VALUES ('{$u_first_name}','{$u_last_name}','{$u_email}','{$u_nic_no}','{$hashed_password}','{$u_gender}','{$u_division}','{$u_address_no}','{$u_street}','{$u_city}','{$u_contact_no1}','{$u_contact_no2}','{$verification_code}',false,false,'{$u_latitude}','{$u_longitude}','{$imgContent}','{$imgContent1}',0)";
				$result = mysqli_query($connection, $query);
				

					       
            		

          					  	if ($result) {
					//query successful..redirecting to users page
					 echo 'record added successfully!';
				
					}else{
							$errors[] = 'Failed to add the new record.';
							die;
						}

					}}

			
						//mail sending code
					$to				=	$u_email;	//receiver
					$sender			=	'kn52646@gmail.com';	//email address of the sender
					$mail_subject	=	'Verify Email Address';
					$email_body		=	'<p>Dear' . $u_first_name . '</p>';
					$email_body		.=	'<p>Thank you for signing up.There is one more step.Click below link to verify your email address in order to activate your account.</p>';
					$email_body		.=	'<p>' . $verification_URL . '</p>';
					$email_body		.=	'<p>Thank You, <br></p>';

					$header			=	"From:	{$sender}\r\nContent-Type:	text/html;";
					$send_mail_result	=	mail($to, $mail_subject, $email_body, $header);

					if($send_mail_result) {
				// mail sent successfully
				echo 'please check your email.';


					}else{
					// mail could not be sent
					echo 'Error.';
					}
					die;


				}	
	}
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Signup</title>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 </head>
 <body id= "body">
 		<style type="text/css">
 			#body{
 			background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
 		}

 		</style>
 	
 		<?php 
 			if (!empty($errors)) {
 				echo "<script type='text/javascript'>alert('There were error(s) on your form.');</script>";
 				 

 				foreach($errors as $error){
 				
 					echo "<script type='text/javascript'>alert('$error.');</script>";
 				}
 				echo '</div>';
 			}
 		 ?>
 		

 	<div class="container-fluid col-lg-4 col-md-6 col-sm-8 col-xs-12 align-content-center shadow p-3 mb-5 bg-dark rounded" style="opacity: 0.8" >
 	

 		<form class="form-conatiner text-light" method="post" enctype="multipart/form-data">
 			<div class="fs-2 fw-bold text-center m-3">User Signup</div>

 			<div class="row mb-3 col-12">
      				<a class=" btn btn-outline-primary p-2" href="map4.html">Tap here to mark your location on google maps</a>
    		</div>

    		<div class="row mb-2">
      			<div class="col-3"><label class="form-label m-1" for="newLatId1">Latitude:</label></div>
     			 <div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" id="newLatId1" name="newLatId1" placeholder="Enter Latitude" required></div>
    		</div>

    		<div class="row mb-2">
      				<div class="col-3"><label class="form-label m-1" for="newLngId1">Longitude:</label></div>
     				<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" id="newLngId1" name="newLngId1" placeholder="Enter Longitude" required></div>
   			 </div>


    
    	<div class="row mb-2">
 			<div class="col-3"><label class="form-label">First Name</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" name="u_first_name" placeholder="Enter First Name" required></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Last Name</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary"  type="text" name="u_last_name" placeholder="Enter Last Name" required></div>
 		</div>

 		

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Email</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" name="u_email" placeholder="Enter Email" required></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Gender</label></div>
 			<div class="col-4"><input class="form-check-input bg-dark text-light border-primary" type="radio" name="u_gender" value="Male" required>Male
 			<input class="form-check-input bg-dark text-light border-primary" type="radio" name="u_gender" value="Female" required>Female</div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Division</label></div>
 			<div class="col-8"><select class="form-select bg-dark text-light border-primary" name="u_division" required></div>
 				<option>division1</option>
 				<option>division2</option>
 			</select>
 			<br>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Address No</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" name="u_address_no" placeholder="Enter Address NO" required></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Street</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" name="u_street" placeholder="Enter Street" required></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">City</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" name="u_city" placeholder="Enter City" required></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Contact (Primary)</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" name="u_contact_no1" placeholder="Enter Contact No" required></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Contact (Optional)</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="text" name="u_contact_no2" placeholder="Enter Contact No"></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-4"><label class="form-label">Profile Photo</label></div>
 			<div class="col-7"><input class="form-control bg-dark text-light border-primary" type="file" name="image"></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-4"><label class="form-label">NIC/Passport/ Driving licence Photo</label></div>
 			<div class="col-7"><input class="form-control bg-dark text-light border-primary" type="file" name="image1"></div>
 		</div>



 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">User Name</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" id="text" type="text" name="u_nic_no" placeholder="Enter NIC No" required></div>
 		</div>

 		<div class="row mb-2">
 			<div class="col-3"><label class="form-label">Password</label></div>
 			<div class="col-8"><input class="form-control bg-dark text-light border-primary" type="password" name="u_password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password" required></div>
 		</div>

 		<div class="row mb-2">
              <div class="col-3"><label for="form-label">Confirm Password</label></div>
              <div class="col-8"><input type="password" class="form-control bg-dark text-light border-primary" id="confirm_password" placeholder="Enter Password" required></div>
          </div>

 		<input class="form-control bg-success text-light mb-2 border-0 p-2"  type="submit"  name="submit" value="Signup">

 		<div class="row align-content-center ">
 			<div class="col-6 "><input class="form-control btn btn-secondary" type="reset" name="reset"></div>
 			<div class="col-6 "><a href="login.php" class="btn btn-secondary">Click here to Login</a></div>		
 		</div>
 		</form>

 	</div>



 		<script type="text/javascript">
    //get items from local storage
    let Lat1 = localStorage.getItem("latitude1");
    let Lng1 = localStorage.getItem("longitude1");
    //assign items for Id
    document.getElementById("newLatId1").value= Lat1;
    document.getElementById("newLngId1").value= Lng1;

    console.log(Lat1);
    console.log(Lng1);
    
 	 </script>


	<script>
     var pwd = document.getElementById("pwd")
      , confirm_password = document.getElementById("confirm_password");

      function validatePassword(){
        if(pwd.value != confirm_password.value) {
           confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
          confirm_password.setCustomValidity('');
                }
        }

      pwd.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
    </script>
 	
 </body>
 </html>
<?php mysqli_close($connection); ?>