<?php
   session_start();
   require_once('../../database/db_connect.php');
   require_once('../admin-handlers.php');
   require_once("process-edit-store-administrative.php");

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

		              <a href="../administrator-dashboard-archive.php">Dashboard</a>
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
		               <li><a href="../admin-archive-logout.php">Log Out</a></li>

		             </ul>
		            </div>

		         </div>

		       </div>
		      
	<!-- HEADER STOPS HERE -->


	<div class="container-fluid">
		<div class="row  d-flex justify-content-around">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 bg-primary mt-4">

				<?php

             if (isset($_GET['editPersonnel']) && $_GET['editPersonnel'] == 'successful') {
             	
             	echo "<div class='alert alert-success'>Successufully Edited</div>";
             }elseif (isset($editPerErrorMessage)) {
             	
             	echo "<div class='alert alert-danger'>$editPerErrorMessage</div>";
             }
				?>

				<h1 class="text-center">Edit Store Administrative</h1>
				<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">

	<div class="form-group">
		<label>Fullname:</label>
		<input type="text" name="editPersonelName" value="<?php
        if (isset($_GET['editAdminPerson'])) {
        	
        	   $theStorePersonel = $_GET['editAdminPerson'];

        	   $theDetOfStorePerson = "SELECT * FROM store_admin WHERE id = $theStorePersonel ";

        	   $queryTheStorePersonel = mysqli_query($db_connection, $theDetOfStorePerson);

        	   if (!$queryTheStorePersonel) {
        	   	
        	   	 die("could not query QUERYTHESTOREPERSONNEL" .mysqli_error($db_connection));
        	   }

        	   $fetchThePersonelDet = mysqli_fetch_assoc($queryTheStorePersonel);
		 echo $fetchThePersonelDet['store_userFullName'];
		 } ?>" class='form-control'>
	</div>

			<div class="form-group">
				<label>Username:</label>
				<input type="text" name="editPersonelUsername" value="<?php  

						if (isset($_GET['editAdminPerson'])) {
   	
   	   $theStorePersonel = $_GET['editAdminPerson'];

   	   $theDetOfStorePerson = "SELECT * FROM store_admin WHERE id = $theStorePersonel ";

   	   $queryTheStorePersonel = mysqli_query($db_connection, $theDetOfStorePerson);

   	   if (!$queryTheStorePersonel) {
   	   	
   	   	 die("could not query QUERYTHESTOREPERSONNEL" .mysqli_error($db_connection));
   	   }

   	   $fetchThePersonelDet = mysqli_fetch_assoc($queryTheStorePersonel);

   	   $personelName = $fetchThePersonelDet['store_userFullName'];
   	   echo $fetchThePersonelDet['store_username'];
   }
    ?>" class='form-control'>
					</div>

			<div class="form-group">
				<label>Email:</label>
				<input type="text" name="editPersonelEmail" value="<?php 

						if (isset($_GET['editAdminPerson'])) {
   	
   	   $theStorePersonel = $_GET['editAdminPerson'];

   	   $theDetOfStorePerson = "SELECT * FROM store_admin WHERE id = $theStorePersonel ";

   	   $queryTheStorePersonel = mysqli_query($db_connection, $theDetOfStorePerson);

   	   if (!$queryTheStorePersonel) {
   	   	
   	   	 die("could not query QUERYTHESTOREPERSONNEL" .mysqli_error($db_connection));
   	   }

   	   $fetchThePersonelDet = mysqli_fetch_assoc($queryTheStorePersonel);

   	   $personelName = $fetchThePersonelDet['store_userFullName'];
   	   echo $fetchThePersonelDet['store_user_email'];
   }

    ?>" class='form-control'>
					</div>


					<div class="form-group">
						<label>Department</label>
						<select class="form-control" name="editPersonelDept">
							<option value="noEditDept">Select Department</option>
							<option value="LC">LC</option>
							<option value="Bills">Bills</option>
							<option value="Invisible">Invisible</option>
							<option value="Non-Valid">Non-Valid</option>
							<option value="Export">Export</option>

						</select>
					</div>
					
					<div class="form-group">
						<label>Password:</label>
						<input type="text" disabled="disabled" value="" class="form-control">
					</div>


					<div class="form-group">
						
						<input type="hidden" name="storeEditedDate">
					</div>

					<div class="form-group">
						
						<input type="hidden" name="personelIdNo" value="<?php 
						if (isset($_GET['editAdminPerson'])) {
						   	
						   	   $theStorePersonel = $_GET['editAdminPerson'];

						   	   $theDetOfStorePerson = "SELECT * FROM store_admin WHERE id = $theStorePersonel ";

						   	   $queryTheStorePersonel = mysqli_query($db_connection, $theDetOfStorePerson);

						   	   if (!$queryTheStorePersonel) {
						   	   	
						   	   	 die("could not query QUERYTHESTOREPERSONNEL" .mysqli_error($db_connection));
						   	   }

						   	   $fetchThePersonelDet = mysqli_fetch_assoc($queryTheStorePersonel);

						   	   $personelName = $fetchThePersonelDet['store_userFullName'];
						   	   echo $fetchThePersonelDet['id'];
						   }
						?>">
					</div>

					<div class="form-group" align="center">
						<button type="submit" name="editPersonelButton">Edit Admin</button>
					</div>
				</form>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

