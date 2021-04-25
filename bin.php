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
            $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><select class='form-select' aria-label='Default select example'><option selected>Open this select menu</option><option value='1'>One</option><option value='2'>Two</option><option value='3'>Three</option></select></td><td><input class='form-control' type='text' name='quantity[]' placeholder='Asset Code'></td><td><input class='form-control' type='number' name='sell[]' placeholder='Qty'></td><td><button class='btn btn-xs btn-danger' type='button' onclick=delete_row('row"+$rowno+"')>-</button></td></tr>");
        }
     	function delete_row(rowno)
      	{
          $('#'+rowno).remove();
      	}
	</script>

	

	<!-- Font Awesome -->
	<link
	  href="css/bootstrap.min.css"
	  rel="stylesheet"
	/>

</head>
<body>
		<table id="employee_table" align="center">
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
					<input class='form-control' type='number' name='sell[]' placeholder='Qty'>
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