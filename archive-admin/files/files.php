<?php
   session_start();
   require_once('../../database/db_connect.php');
   require_once('../admin-handlers.php');

?>
<?php notAdministartorLogin(); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../admin-style.css">
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
            <h1 class="text-center">FILES'S DETAILS</h1>
      			<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
      				<div class="form-group">
      					<select class="form-control" name="filesDetails">
      						<option value="nonChosen">Select File By Department</option>
      						<option value="allFiles">All Files</option>
      						<option value="lcFiles">LC Files</option>
      						<option value="billsFiles">Bills Files</option>
      						<option value="invisibleFiles">Invisible Files</option>
      						<option value="nonValidFiles">Non-Valid Files</option>
      						<option value="exportFiles">Export Files</option>
      					</select>
      				</div>
      				 <div class="form-group">
      				 	<button type="submit" name="findButtonFiles">Find Files</button>
      				 </div>
      			</form>
      		</div>
      	</div>
      </div>


      <div class="container-fluid">
      	<div class="row d-flex justify-content-around">
      		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bg-primary">
<!--DELETE FILE DISPLAY MESSAGE START FROM HERE -->
      <?php
         if (isset($_GET['lcFileDeleteStatus']) && $_GET['lcFileDeleteStatus'] == 'deleted') {
               
               echo "<div class='alert alert-success mt-4'>File Deleted</div>";

         }elseif(isset($_GET['billsFileDeleteStatus']) && $_GET['billsFileDeleteStatus'] == 'deleted') {
               
               echo "<div class='alert alert-success mt-4'>File Deleted</div>";

   }elseif(isset($_GET['invisibleFileDeleteStatus']) && $_GET['invisibleFileDeleteStatus'] == 'deleted') {
         
         echo "<div class='alert alert-success mt-4'>File Deleted</div>";

   }elseif(isset($_GET['nonValidFileDeleteStatus']) && $_GET['nonValidFileDeleteStatus'] == 'deleted') {
         
         echo "<div class='alert alert-success mt-4'>File Deleted</div>";


   }elseif(isset($_GET['exportFileDeleteStatus']) && $_GET['exportFileDeleteStatus'] == 'deleted') {
         
         echo "<div class='alert alert-success mt-4'>File Deleted</div>";
   }
      ?>

<!--DELETE FILE DISPLAY MESSAGE ENDS HERE -->


      			<?php
      		
 require_once("process-all-files.php");
 require_once("process-lc-files.php");
 require_once("process-bills-files.php");
 require_once("process-invisible-files.php");
 require_once("process-non-valid-files.php");
 require_once("process-export-files.php");
 require_once("process-delete-lc-file.php");
 require_once("process-delete-bills-file.php");
 require_once("process-delete-invisible-file.php");
 require_once("process-delete-non-valid-file.php");
 require_once("process-delete-export-file.php");



               

      			?>
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