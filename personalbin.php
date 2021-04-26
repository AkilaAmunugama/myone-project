<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<script type="text/javascript">
        function add_row()
        {
            $rowno=$("#employee_table tr").length;
            $rowno=$rowno+1;
            $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><select class='form-select' aria-label='Default select example'><option selected>Open this select menu</option><option value='1'>One</option><option value='2'>Two</option><option value='3'>Three</option></select></td><td><input class='form-control' type='text' name='quantity[]' placeholder='Enter Quantity'></td><td><select class='form-select' aria-label='Default select example'><option selected>Open this select menu</option><option value='Yes'>Yes</option><option value='No'>No</option></select></td><td><button class='btn btn-xs btn-danger' type='button' onclick=delete_row('row"+$rowno+"')>-</button></td></tr>");
        }
     	function delete_row(rowno)
      	{
          $('#'+rowno).remove();
      	}
	</script>

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

	<!-- Font Awesome -->
	<link
	  href="css/bootstrap.min.css"
	  rel="stylesheet"
	/>
</head>



<body id="body">

<?php
    if(isset($_POST['sasa'])){

      //  print_r($_POST);


      //  echo "".
       $plastic_q    = $_POST['plastic_q']."   "; 
      //  echo "".
       $plastic_sell    = $_POST['plastic_sell']."   ";
      //  echo "".
       $organic_q    = $_POST['organic_q']."   ";
      //  echo "".
       $organic_sell    = $_POST['organic_sell']."   ";
      //  echo "".
       $polythene_q   = $_POST['polythene_q']."   ";
      //  echo "".
       $polythene_sell    = $_POST['polythene_sell']."   ";
      //  echo "".
       $metal_q    = $_POST['metal_q']."   ";
      //  echo "".
       $metal_sell    = $_POST['metal_sell']."   ";
      //  echo "".
       $paper_q    = $_POST['paper_q']."   ";
      //  echo "".
       $paper_sell    = $_POST['paper_sell']."   ";
      //  echo "".
       $coconut_shell_q    = $_POST['coconut_shell_q']."   ";
      //  echo "".
       $coconut_shell_sell    = $_POST['coconut_shell_sell']."   ";
      //  echo "".
       $glass_q    = $_POST['glass_q']."   ";
      //  echo "".
       $glass_sell    = $_POST['glass_sell']."   ";
      //  echo "".
       $fabric_q    = $_POST['fabric_q']."   ";
      //  echo "".
       $fabric_sell    = $_POST['fabric_sell']."   ";
      //  echo "".
       $e_waste_q    = $_POST['e-waste_sell']."   ";
      //  echo "".
       $e_waste_sell    = $_POST['e-waste_q']."   ";
       $my_date = date("Y-m-d H:i:s"); 
      //  echo "".$my_date ."   ";
       $u_nic_no= $_SESSION['u_nic_no'];
      //  echo "".$u_nic_no."   ";


      $query="INSERT INTO `personal_bin`( `u_nic_no`, `update_date`, `plastic_q`, `plastic_sell`, `organic_q`, `organic_sell`, `polythene_q`, `polythene_sell`, `metal_q`, `metal_sell`, `paper_q`, `paper_sell`, `coconut_shell_q`, `coconut_shell_sell`, `glass_q`, `glass_sell`, `fabric_q`, `fabric_sell`, `e-waste_q`, `e-waste_sell`) VALUES 
      ('$u_nic_no', '$my_date' , '$plastic_q','$plastic_sell','$organic_q','$organic_sell' ,'$polythene_q' ,'$polythene_sell','$metal_q','$metal_sell','$paper_q','$paper_sell' , '$coconut_shell_q' , '$coconut_shell_sell'  ,'$glass_q','$glass_sell' ,'$fabric_q' ,'$fabric_sell' , '$e_waste_q' ,'$e_waste_sell')";
      
      $result=mysqli_query($connection,$query);
      if(!$result)
        die ('data not inserted..!'.mysqli_error($connection));
      else
        echo " Outlet is inserted Successfully...!";
    

    }


    ?>

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
                            <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
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

        <center  style="margin-top: 30px;" >
              <h1> The Personal Bin Entry </h1>
        </center>


<form action="personalbin.php" method="post">

		<table id="employee_table" align="center">
            <tr>
              <td>
                <label class="form-label">CATEGERY</label>
              </td>
              <td>
                <label class="form-label">ENTER QUNTITIY</label>
              </td>
              <td>
                <label class="form-label">SELL</label>
              </td>

            </tr>

          <?php
            
			$query	= " SELECT * FROM `bin_categories`";

			$result_set = mysqli_query($connection, $query);
        
      if(!$result_set){
        die("Error in image".mysqli_error($conn));
      }
      echo "\n<br>";
       
       

      while($res = mysqli_fetch_assoc($result_set)){
        ?>
          
          
       

        
        
        

            <tr>
            	<td>
 					      <label  class="form-control"   aria-label="Default select example">
					         <option selected>  <?php   echo "". $res['category']; ?>  </option>					          
					     </label>
            	</td>
            	<td>
                	<!-- <input type="text" class="form-control" name='quantity[]' placeholder="Enter Quantity"> -->
                	<input type="text" class="form-control" name='<?php   echo "". $res['category']."_q"; ?>' placeholder="Enter Quantity">

            	</td>
            	<td>
					
                 <select  name='<?php   echo "". $res['category']."_sell"; ?>' class="  form-select" aria-label="Default select example">
                   <option  disabled hidden >Set Sale State</option>
                   <option value="1">Yes</option>
                   <option selected value="0">No</option>
                  
               </select>
            	</td>
            	<!-- <td>
            		<button class="btn btn-sm btn-danger text-white" type="button" onclick="add_row();">+</button>
            	</td>                   -->
            </tr>
 
            <?php
        }
          ?>

                   
            <tr id="row1">

            </tr>
            
            <tr style="margin-top:40px;" > 
              <td></td>
              <td></td>
              <td><input type="submit" name="sasa" value="submit"/> </td>
            </tr>
            
        </table>
        
        </form>
            

     

            <script src="js/jquery.js"></script>

<!-- MDB -->
<script
  type="text/javascript"
  src="js/bootstrap.bundle.min.js"
></script>
</body>
</html>
<?php mysqli_close($connection); ?>