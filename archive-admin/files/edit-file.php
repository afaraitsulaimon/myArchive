<?php
   session_start();
   require_once('../../database/db_connect.php');
   require_once('../admin-handlers.php');
   require_once('process-edit-lc-file.php');
   require_once('process-edit-bills-files.php');
   require_once('process-edit-invisible-file.php');
   require_once('process-edit-non-valid-file.php');

?>
<?php notAdministartorLogin(); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../admin-style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<title>Edit File</title>
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
      		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bg-primary">
<!-- DISPLAYING EERROR AND SUCCESSFUL MESSAGE  START FROM HERE-->
      <?php
          if (isset($_GET['lcEditFileStatus']) && $_GET['lcEditFileStatus'] == 'successful') {
                
                echo "<div class='alert alert-success'>Successfuly Edited</div>";
          }elseif (isset($errEditFileMessage)) {
                
                echo "<div class='alert alert-danger'>$errEditFileMessage</div>";

          }elseif (isset($_GET['billsEditFileStatus']) && $_GET['billsEditFileStatus'] == 'successful') {
                
                 echo "<div class='alert alert-success'>Successfuly Edited</div>";

          }elseif (isset($errEditBillsFileMess)) {
                
                echo "<div class='alert alert-danger'>$errEditBillsFileMess</div>";

          }elseif (isset($_GET['InvisibleEditFileStatus']) && $_GET['InvisibleEditFileStatus'] == 'successful') {
            
            echo "<div class='alert alert-success'>Successfuly Edited</div>";

          }elseif (isset($errEditInvisibleFileMess)) {
                
                echo "<div class='alert alert-danger'>$errEditBillsFileMess</div>";

          }elseif (isset($_GET['nonValidEditFileStatus']) && $_GET['nonValidEditFileStatus'] == 'successful') {
          	
          	echo "<div class='alert alert-success'>Successfuly Edited</div>";

          }elseif (isset($errEditNonValidFileMess)) {
                
                echo "<div class='alert alert-danger'>$errEditBillsFileMess</div>";

          }elseif (isset($_GET['exportEditFileStatus']) && $_GET['exportEditFileStatus'] == 'successful') {
          	
          	echo "<div class='alert alert-success'>Successfuly Edited</div>";

          }elseif (isset($errEditExportFileMess)) {
                
                echo "<div class='alert alert-danger'>$errEditBillsFileMess</div>";

          }

      ?>

      <!-- DISPLAYING EERROR AND SUCCESSFUL MESSAGE ENDS HERE-->
            <h1 class="text-center">EDIT FILE DETAILS</h1>
	<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">

            <div class="form-group">
                  <label>File Number:</label>
                <input type="text" name="editFileNo" value="<?php 
                  
                  if(isset($_GET['FileId'])){

                      $file_id_no = $_GET['FileId'];  

                    $theFileNoDet = "SELECT * FROM storefile WHERE storeFile_id = $file_id_no";

                    $queryTheFileNoDet = mysqli_query($db_connection,$theFileNoDet); 

                    if(!$queryTheFileNoDet){

                        die("could not query QUERYTHEFILENODET".mysqli_error($db_connection));

                    }   


                    $fetchTheFileNoDet = mysqli_fetch_assoc($queryTheFileNoDet);

                    echo $fetchTheFileNoDet['storeFileNo'];
                  }
                ?>" class="form-control">
            </div>


	<div class="form-group">
            <label>Department:</label>
		<select class="form-control" name="filesDept">
			
			<option value="noFile">Select File Department</option>
			<option value="LC">LC Files</option>
			<option value="Bills">Bills Files</option>
			<option value="Invisible">Invisible Files</option>
			<option value="Non-Valid">Non-Valid Files</option>
			<option value="Export">Export Files</option>
		</select>
	</div>

      <div class="form-group">
                  <label>Assign User:</label>
                
                <select class="form-control" name="userOfFile">
                  <option value='noUser'>Assign a User</option>
                <?php
                   if (isset($_GET['FileId'])) {
                         
                         $idOfFile = $_GET['FileId'];

                  $detailsOfFile = "SELECT * FROM storefile WHERE storeFile_id = $idOfFile";

                  $queryDetailsOfFile = mysqli_query($db_connection, $detailsOfFile);

                  if (!$queryDetailsOfFile) {
                        
                        die("could not query QUERY DETAILS OF FILE" .mysqli_error($db_connection));
                  }

                  $fetchDetailsOfFile = mysqli_fetch_assoc($queryDetailsOfFile);

                  $fetchDept = $fetchDetailsOfFile['dept_StoreFile'];


                  $theFileEditUser = "SELECT * FROM users WHERE users_department = '$fetchDept' ";


                  $queryTheFileEditUser = mysqli_query($db_connection, $theFileEditUser);

                  $rowEditUser = mysqli_num_rows($queryTheFileEditUser);

                  while ($fetchEditUser = mysqli_fetch_assoc($queryTheFileEditUser)) {
                        
                        echo "<option value='".$fetchEditUser['users_FullName']."'>".$fetchEditUser['users_FullName']."</option>";
                  }


                   }
                ?>
                </select>

            </div>

            <div class="form-group">
                  <label>File Picker:</label>
                <select class="form-control" name="pickerOfFile">
                  <option value='noPicker'>Assign a Picker</option>
                <?php
                   if (isset($_GET['FileId'])) {
                         
                         $idOfFile = $_GET['FileId'];

                  $detailsOfFile = "SELECT * FROM storefile WHERE storeFile_id = $idOfFile";

                  $queryDetailsOfFile = mysqli_query($db_connection, $detailsOfFile);

                  if (!$queryDetailsOfFile) {
                        
                        die("could not query QUERY DETAILS OF FILE" .mysqli_error($db_connection));
                  }

                  $fetchDetailsOfFile = mysqli_fetch_assoc($queryDetailsOfFile);

                  $fetchDept = $fetchDetailsOfFile['dept_StoreFile'];


                  $theFileEditPicker = "SELECT * FROM store_admin WHERE store_user_dept = '$fetchDept' ";


                  $queryTheFileEditPicker = mysqli_query($db_connection, $theFileEditPicker);

                  $rowEditPicker = mysqli_num_rows($queryTheFileEditPicker);

                  while ($fetchEditPicker = mysqli_fetch_assoc($queryTheFileEditPicker)) {
                        
                        echo "<option value='".$fetchEditPicker['id']."'>".$fetchEditPicker['store_userFullName']."</option>";
                  }


                   }
                ?>
                </select>
            </div>
              
              <div class="form-group">
                    <input type="hidden" name="idNoToEdit" value="<?php 
                      
                      if(isset($_GET['FileId'])){

                          $file_id_no = $_GET['FileId'];  

                        $theFileNoDet = "SELECT * FROM storefile WHERE storeFile_id = $file_id_no";

                        $queryTheFileNoDet = mysqli_query($db_connection,$theFileNoDet); 

                        if(!$queryTheFileNoDet){

                            die("could not query QUERYTHEFILENODET".mysqli_error($db_connection));

                        }   


                        $fetchTheFileNoDet = mysqli_fetch_assoc($queryTheFileNoDet);

                        echo $fetchTheFileNoDet['storeFile_id'];
                      }
                    ?>" class="form-control">

              </div>

		 <div class="form-group">
		 	<button type="submit" name="editFileButton">Edit File</button>
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