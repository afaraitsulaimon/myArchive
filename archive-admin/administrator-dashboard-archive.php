<?php
   session_start();
   require_once('../database/db_connect.php');
   require_once('admin-handlers.php');
?>
<?php notAdministartorLogin(); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="admin-style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Admin Dasboard</title>
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

	       	<div class="container-fluid adminstratorTime">
	       		<div class="row d-flex justify-content-around">
	       			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
	       				<?php
	                             
	                             $presentTime = date('H');

	                             if ($presentTime < 12 || $presentTime == 24) {
	                             	
	                             	echo "<div>Good Morning Admin</div>";

	                             }elseif ($presentTime >= 12 || $presentTime <= 15) {
	                             	echo "<div>Good Afternoon Admin</div>";
	                             }elseif ($presentTime >= 16 || $presentTime <= 23) {
	                             	
	                             	echo "<div>Good Evening Admin</div>";
	                             }

	       				?>
	       			</div>
	       		</div>
	       	</div>




	       	<div class="container-fluid dashboardContent" style="margin-top: 100px;">
	       		<div class="row d-flex justify-content-around">
	       			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg-primary text-center storeAdminUser pt-4 pb-4">
	       				<a href="storeadmin-admin/admin-store-admin.php">STORE ADMIN</a>
	       			
	       			</div>

	       			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg-secondary text-center fileUsers pt-4 pb-4">
	       			
	       					<a href="admin-store-users/admin-users.php">STORE USERS</a>
	       				
	       			</div>


	       			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg-info text-center storeFiles pt-4 pb-4">
	       				
	       				<a href="files/files.php">FILES </a>
	       				
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