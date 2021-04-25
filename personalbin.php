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
		<table id="employee_table" align="center">
            <tr>
              <td>
                <label class="form-label">CATEGERO</label>
              </td>
              <td>
                <label class="form-label">ENTER QUNTITIY</label>
              </td>
              <td>
                <label class="form-label">SELL</label>
              </td>

            </tr>
            <tr>
            	<td>
 					      <select class="form-select" aria-label="Default select example">
					         <option selected>Open this select menu</option>
					         <option value="1">One</option>
					         <option value="2">Two</option>
					          <option value="3">Three</option>
					     </select>
            	</td>
            	<td>
                	<input type="text" class="form-control" name='quantity[]' placeholder="Enter Quantity">
            	</td>
            	<td>
					
                 <select class="form-select" aria-label="Default select example">
                   <option selected>Open this select menu</option>
                   <option value="Yes">Yes</option>
                   <option value="No">No</option>
                  
               </select>
            	</td>
            	<td>
            		<button class="btn btn-sm btn-danger text-white" type="button" onclick="add_row();">+</button>
            	</td>                  
            </tr>
                   
            <tr id="row1">

            </tr>
        </table>
            <script src="js/jquery.js"></script>

<!-- MDB -->
<script
  type="text/javascript"
  src="js/bootstrap.bundle.min.js"
></script>
</body>
</html>
<?php mysqli_close($connection); ?>