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
	<title>Admin Page</title>
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







      <div class="container-fluid mt-4">
      	<div class="row d-flex justify-content-around">
      		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

            <h1 class="text-center pb-4">STORE ADMINISTRATIVE'S</h1>
      			<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
      				<div class="form-group">
      					<select class="form-control" name="storeAdminUsers">
      						<option value="nonChosen"></option>
      						<option value="allStoreAdminUsers">All</option>
      						<option value="lcStoreAdminUsers">LC</option>
      						<option value="billsStoreAdminUsers">Bills</option>
      						<option value="invisibleStoreAdminUsers">Invisible</option>
      						<option value="nonValidStoreAdminUsers">Non-Valid</option>
      						<option value="exportStoreAdminUsers">Export</option>
      					</select>
      				</div>
      				 <div class="form-group">
      				 	<button type="submit" name="findButton">Find</button>
      				 </div>
      			</form>
      		</div>
      	</div>
      </div>


      <div class="container-fluid">
      	<div class="row d-flex justify-content-around">
      		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bg-primary">

      			<?php
      		
            if (isset($_GET['adminDeleted']) && $_GET['adminDeleted'] == 'success') {
              
              echo "<div class='alert alert-success mt-3'>Successfuly deleted</div>";

            }elseif (isset($_GET['billsAdminDeleted']) && $_GET['billsAdminDeleted'] == 'success') {
              
              echo "<div class='alert alert-success mt-3'>Successfuly deleted</div>";

            }elseif (isset($_GET['invisibleAdminDeleted']) && $_GET['invisibleAdminDeleted'] == 'success') {
              
              echo "<div class='alert alert-success mt-3'>Successfuly deleted</div>";

            }elseif (isset($_GET['nonValidAdminDeleted']) && $_GET['nonValidAdminDeleted'] == 'success') {
              
              echo "<div class='alert alert-success mt-3'>Successfuly deleted</div>";

            }elseif (isset($_GET['exportAdminDeleted']) && $_GET['exportAdminDeleted'] == 'success') {
              
              echo "<div class='alert alert-success mt-3'>Successfuly deleted</div>";
            }

                require_once("process-admin-store-admin.php");
                require_once("process-store-admin-lc.php");
                require_once("process-store-admin-bills.php");
                require_once("process-store-admin-invisible.php");
                require_once("process-store-admin-nonvalid.php");
                require_once("process-store-admin-export.php");
              
              require_once("process-delete-lcstore-admin.php");

            require_once("process-delete-bills-store-admin.php");
        require_once("process-delete-invisible-store-admin.php");
          require_once("process-delete-nonvalid-store-admin.php");

          require_once("process-delete-export-store-admin.php");
      			?>
      		</div>
      	</div>
      </div>




	<script type="text/javascript" src="../../bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>