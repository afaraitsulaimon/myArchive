
<?php

  require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-login-store-admin.php");
 require_once('process-store-add-file.php');
 require_once("process-store-edit-file.php");

?>

<?php notLoggedInStore() ?>






<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Edit File Details</title>

  <style type="text/css">
    
    
  </style>
</head>
<body>

  
  




	<section class="newGround">

		<!--HEADER DASHBOARD FOR STORE START FROM HERE -->
           
          <div class="container-fluid" id="dashBoardHeader">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg bg-danger">

                <?php

       //store the logged in user id in a variable
                //by using the function loggedInStore() to check the session of the user that logged in
                // then fetch the name and display it

              
                   
                   $logOnUserId = loggedInStore();




                //select all from the store_admin table

                $loggedUserDet = "SELECT * FROM store_admin WHERE id = $logOnUserId ";
 

                $queryLoggedUser = mysqli_query($db_connection,$loggedUserDet);

   if (!$queryLoggedUser) {
     
     die("could not queru QUERYLOGGEDUSER" .mysqli_error($db_connection));
   }



                $fetchLogUserDet = mysqli_fetch_assoc($queryLoggedUser);


        $storeAdminFullName = $fetchLogUserDet['store_userFullName'];
        $storeAdminUserName = $fetchLogUserDet['store_username'];

                

                 echo "<a href='store-dashboard.php'>$storeAdminFullName</a>";

                
                 

                
                 ?>
               </div>

               <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bg-primary">
                  <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle = "dropdown" style="float: right;"><?php echo "$storeAdminUserName"; ?></a>
                 <ul class="dropdown-menu">
                   <li><a href="store-change-pw.php">Change Password</a></li>
                   <li><a href="#">Edit Profile</a></li>
                   <li><a href="store-logout.php">Log Out</a></li>

                 </ul>
               </div>

            </div>

          </div>
         
    <!--HEADER DASHBOARD FOR STORE ENDS HERE -->


     
     <!-- FORM FOR THE EDITTIN BODY START FROM HERE-->

     <div class="container">
        <div class="row d-flex justify-content-around">
           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bg-danger mt-5">

            <?php
           if (isset($_GET['updateStatus']) && $_GET['updateStatus'] == 'successful') {
             
             echo "<div class = 'alert alert-success'>Successfully Updated</div>";
           }elseif (isset($editStoreFileMess)) {
             
             echo "<div class='alert alert-danger'>$editStoreFileMess</div>";
           }
            ?>
               
               <h2 class="text-center" style="font-weight: bolder; font-size: 3em;">EDIT FILE</h2>
               <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                
                <div class="form-group" align="center">
                  <label>Select Department</label><br>
                

                           <select style="text-align-last:center; width: 30%; height: 40px; border-radius: 5px;" name="storeFileEditDept">
                            
                             <option value="noEditDept">Select Department</option>
                              <?php
                               $sqlDept = "SELECT store_user_dept FROM store_admin WHERE id = $logOnUserId";

                               $queryDept = mysqli_query($db_connection, $sqlDept);

                               if (!$queryDept) {
                                 die("could not query QUERY DEPT" .mysqli_error($db_connection));
                               }

                           
                            $rowsDept = mysqli_num_rows($queryDept);

                            while ($rowsDept = mysqli_fetch_assoc($queryDept)) {
                                  echo "<option value ='".$rowsDept['store_user_dept'] ."'>" . $rowsDept['store_user_dept'] . "</option>";
                

                                  $theDepartment = $rowsDept['store_user_dept'];
                            }
                               

                               
                               ?>
                             
                            
                           </select>
                         </div>

                         
                         <div class="form-group" align="center" style="font-size: 1.5em;">
                           <label>Assign User</label><br>
                <select style="text-align-last:center; width: 30%; height: 40px; border-radius: 5px;" name="userOfFileEdit">

                       <option value="noEditUser">SELECT USER</option>
                         
                                <?php
                         $usersNameSql = "SELECT * FROM users WHERE users_department = '$theDepartment' ";
                         
                         

                           $queryUsersName = mysqli_query($db_connection,$usersNameSql);


                       $row = mysqli_num_rows($queryUsersName);
                      while ($row = mysqli_fetch_assoc($queryUsersName)) {
                          echo "<option value ='".$row['users_FullName'] ."'>" . $row['users_FullName'] . "</option>";
                    
                       }             
                           
                                ?> 
                        
                
                  </select>
                         </div>



                         

                         <div class="form-group" style="text-align: center; font-size: 1.5em;">
                           <label>File No</label>
                        <input type="text" name="fileToRetrive" class="form-control" value=" <?php

                         // GET THE ID WHEN YOU CLICK ON THE EDIT BUTTON  -
                         //<td><button name='edit-inventory'><a href='store-edit-file.php?theEditId= {$fetchLogtheUserDet['storeFile_id']} 
                         // FROM THE STORE-DASHBOARD.PHP

                         //STORE THE ID GET FROM THE (theEditId) AS A VARIABLE

                          if (isset($_GET['theEditId'])) {
                            $rowIdToEdit  = $_GET['theEditId'];

                            //THEN COMPARE THE id from $rowIdToEdit with the id from the storefile

                            $fileToEdit = "SELECT * FROM storefile WHERE storeFile_id = $rowIdToEdit";

                            $queryFileToEdit = mysqli_query($db_connection, $fileToEdit);


                            if (!$queryFileToEdit) {
                              
                              die("could not query QUERYFILETOEDIT" .mysqli_error($db_connection));
                            }


                            //fetch the details from the storefile

                            $fetchEditDet = mysqli_fetch_assoc($queryFileToEdit);


                            //store the file no and the store pickerid

                            $editFileNumber = $fetchEditDet['storeFileNo'];

                            $editFilePickerId = $fetchEditDet['storePickerId'];

                            echo $fetchEditDet['storeFileNo'];

                          }



                         ?>" name="newFileNo">


                         </div>

                  <input type="hidden" name='theFileIdToEdit' value="<?php 

                     echo $fetchEditDet['storeFile_id'];
                  ?> " >

                  <input type="hidden" name="updatedDate">

                         <div class="form-group">
                           <button type="submit" class="form-control theSubmit" name="editTheFile">Edit</button>
                         </div>
                       
                       

               </form>

           </div>
          
        </div>
       
     </div>

  <!-- FORM FOR THE EDITTIN BODY ENDS HERE-->
	</section>





<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html>

<script type="text/javascript">
  
  $("#addFile") .click(function(){


    $("#theFormForInputFile").show();

    $("#tableToDisplayFiles").hide();



  });


  $("#viewFile") .click(function(){

    $("#tableToDisplayFiles").show();
    $("#theFormForInputFile").hide();

  });
</script>