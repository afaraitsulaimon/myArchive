<?php
   session_start();
   require_once('../../database/db_connect.php');
   require_once('../admin-handlers.php');
   require_once("process-edit-lc-users.php");
   require_once("process-edit-bills-users.php");
   require_once("process-edit-invisible-users.php");
   require_once("process-edit-nonvalid-users.php");

?>
<?php notAdministartorLogin(); ?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="admin-style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<title>Edit Users</title>
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
		               <li><a href="admin-archive-logout.php">Log Out</a></li>

		             </ul>
		            </div>

		         </div>

		       </div>
		      
	<!-- HEADER STOPS HERE -->

	
						


	<div class="container-fluid">
		<div class="row d-flex justify-content-around">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bg-info mt-4">

				<?php
      if (isset($_GET['userLcEdited']) && $_GET['userLcEdited'] == 'done') {
      	
      	echo "<div class='alert alert-success mt-4'>User Details Successfully Edited</div>";
      }elseif (isset($errorMessageLcUserEdit)) {
      	
      	echo "<div class='alert alert-danger'>$errorMessageLcUserEdit</div>";

      }elseif (isset($_GET['billsUsersUpdate']) && $_GET['billsUsersUpdate'] == 'correct') {
      	
      	echo "<div class='alert alert-success'>Updated Successfully</div>";
      }elseif (isset($errorMessBillsUserUpdate)) {
      	echo "<div class='alert alert-danger'>$errorMessBillsUserUpdate</div>";
      }elseif (isset($_GET['invisibleUpdate']) && $_GET['invisibleUpdate'] == 'success') {
      	
      	echo "<div class='alert alert-success'>Successfully Edited</div>";
      }elseif (isset($errorMessInvisibleUserUpdate)) {
      	
      	echo "<div class='alert alert-danger'>$errorMessInvisibleUserUpdate</div>";
      }elseif (isset($_GET['userNonValidEdited']) && $_GET['userNonValidEdited'] == 'success') {

      	 echo "<div class='alert alert-success mt-4'>User Details Successfully Updated</div>";
      }elseif (isset($errorMessNonValidUserEdit)) {

      	    echo "<div class='alert alert-danger mt-4'>$errorMessNonValidUserEdit</div>";
      }elseif (isset($_GET['userExportEdited']) && $_GET['userExportEdited'] == 'done') {
      	
      	echo "<div class='alert alert-success mt-4'>User Profile Successfully Updated</div>";

      }elseif (isset($errorMessExportUserEdit)) {
      	
      	echo "<div class='alert alert-danger'>$errorMessExportUserEdit</div>";
      }

				?>


				<h1 class="text-center">Edit User Details</h1>
				<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">

					<div class="form-group">
						<label>Fullname:</label>
						<input type="text" name="nameOfUser" value="<?php

						if(isset($_GET['editUserId'])){

						 $theUserId = $_GET['editUserId'];

						 $usersDetails = "SELECT * FROM users WHERE user_id = $theUserId ";

						 $queryUsersDetails = mysqli_query($db_connection,$usersDetails);

						 if(!$queryUsersDetails){
						   die('could not query QUERYUSERSDETAILS' .mysqli_error($db_connection));
						 }

						 $fetchUsersDet = mysqli_fetch_assoc($queryUsersDetails);
                        
                        echo $fetchUsersDet['users_FullName'];
						 
						}

						  ?>" class="form-control">
					</div>




					<div class="form-group">
						<label>Username:</label>
						<input type="text" name="usernameOfUser" value="<?php
                        
						if(isset($_GET['editUserId'])){

						 $theUserId = $_GET['editUserId'];

						 $usersDetails = "SELECT * FROM users WHERE user_id = $theUserId ";

						 $queryUsersDetails = mysqli_query($db_connection,$usersDetails);

						 if(!$queryUsersDetails){
						   die('could not query QUERYUSERSDETAILS' .mysqli_error($db_connection));
						 }

						 $fetchUsersDet = mysqli_fetch_assoc($queryUsersDetails);

						 echo $fetchUsersDet['usersUsername'];
						}
                          


                       
						  ?>" class="form-control">
					</div>




					<div class="form-group">
						<label>Email:</label>
						<input type="text" name="emailOfUser" value="<?php 
						if(isset($_GET['editUserId'])){

						 $theUserId = $_GET['editUserId'];

						 $usersDetails = "SELECT * FROM users WHERE user_id = $theUserId ";

						 $queryUsersDetails = mysqli_query($db_connection,$usersDetails);

						 if(!$queryUsersDetails){
						   die('could not query QUERYUSERSDETAILS' .mysqli_error($db_connection));
						 }

						 $fetchUsersDet = mysqli_fetch_assoc($queryUsersDetails);
                        
                        echo $fetchUsersDet['users_email'];
						 
						} ?>" class="form-control">
					</div>


					<div class="form-group">
						<label>Department</label>
						<select name="fileUserDept" class="form-control">
							<option value="deptNotPicked">Select Department</option>
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
					<input type="hidden" name="usersId" value="<?php 
						if(isset($_GET['editUserId'])){

						 $theUserId = $_GET['editUserId'];

						 $usersDetails = "SELECT * FROM users WHERE user_id = $theUserId ";

						 $queryUsersDetails = mysqli_query($db_connection,$usersDetails);

						 if(!$queryUsersDetails){
						   die('could not query QUERYUSERSDETAILS' .mysqli_error($db_connection));
						 }

						 $fetchUsersDet = mysqli_fetch_assoc($queryUsersDetails);
                        
                        echo $fetchUsersDet['user_id'];
						 
						}?>">
				</div>

					<div class="form-group" align="center">
						<button type="submit" name="userEditBut">Edit User</button>
					</div>
				</form>
			</div>
		</div>
	</div>




</body>
</html>