<?php
   session_start();
   require_once('../../database/db_connect.php');
   require_once('../admin-handlers.php');

?>
<?php notAdministartorLogin(); ?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="admin-style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<title>Edit Store Admin</title>
</head>
<body>
		<!-- HEADER STARTS FROM HERE -->


		       <div class="container-fluid" id="dashBoardHeader">
		         <div class="row">
		            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg bg-danger">

		              <a href="administrator-dashboard-archive.php">Dashboard</a>
		            </div>

		            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bg-primary">
		               <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle = "dropdown" style="float: right;"><?php 
		                $theLogInAdmin = adminstratorLogin();

		               $admini_user = "SELECT * FROM administrator WHERE admin_id = $theLogInAdmin";


		                   $queryTheLogin = mysqli_query($db_connection, $admini_user); 

		                   if (!$queryTheLogin) {
		                   	
		                   	  die("could not query QUERYTHELOGIN" .mysqli_error($db_connection));
		                   }

		                     $fetchTheLogin = mysqli_fetch_assoc($queryTheLogin);

		                     echo $fetchTheLogin['username'];
		                   ?>
		                   	
		                   </a>
		             <ul class="dropdown-menu">
		               <li><a href="admin-archive-changepass.php">Change Password</a></li>
		               <li><a href="admin-archive-logout.php">Log Out</a></li>

		             </ul>
		            </div>

		         </div>

		       </div>
		      
	<!-- HEADER STOPS HERE -->


	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<h1>Edit Store Administrative</h1>
				<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">

					<div class="form-group">
						<label>Fullname:</label>
						<input type="text" name="" value="">
					</div>

					<div class="form-group">
						<label>Username:</label>
						<input type="text" name="" value="">
					</div>

					<div class="form-group">
						<label>Email:</label>
						<input type="text" name="" value="">
					</div>


					<div class="form-group">
						<label>Department</label>
						<select>
							<option>Select Department</option>
							<option>LC</option>
							<option>Bills</option>
							<option>Invisible</option>
							<option>Non-Valid</option>
							<option>Export</option>

						</select>
					</div>
					
					<div class="form-group">
						<label>Password:</label>
						<input type="text" name="" value="">
					</div>

					<div class="form-group">
						<label>Email:</label>
						<input type="text" name="storeEditedDate" value="">
					</div>

					<div class="form-group">
						<button type="submit">Edit Admin</button>
					</div>
				</form>
			</div>
		</div>
	</div>




</body>
</html>