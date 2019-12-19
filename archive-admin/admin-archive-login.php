<?php
   session_start();
   require_once('../database/db_connect.php');
   require_once('admin-handlers.php');
   require_once('process-admin-archive-login.php');
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="admin-style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Admin Login</title>
</head>
<body>

	  <div class="container-fluid adminLoginPage" >
	  	<div class="row d-flex justify-content-around">
	  		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 border border-info border-bolder">

	<?php
        
        if (isset($errorMessageLogin)) {
        	echo "<div class='alert alert-danger mt-2'>$errorMessageLogin</div>";
        }
	?>
	  			<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" align='center'>

	  				<div class="form-group">
	  					<h1 class="text-center">Administrator's Login</h1>
	  				</div>
	  				<div class="form-group">
	  					<label>Username:</label><br>
	  					<input type="text" name="administratorUsername">
	  				</div>

	  				<div class="form-group">
	  					<label>Password:</label><br>
	  					<input type="password" name="administratorPass">
	  				</div>

	  				<div class="form-group">
	  					<button type="submit" name="adminiEnterButton">Login</button>
	  				</div>
	  			</form>
	  		</div>
	  	</div>
	  </div>



	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>