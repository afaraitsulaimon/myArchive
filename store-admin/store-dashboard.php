
<?php

  require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-login-store-admin.php");
 require_once('process-store-add-file.php');
 require_once('process-delete-store-file.php');

?>







<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Store Dashboard</title>

  <style type="text/css">
    
    .theSubmit:hover{

      background-color: red;
      color: white;
      font-weight: bolder;
    }
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


<!-- beginning of the content -->
       <div class="container-fluid">
         <div class="row d-flex justify-content-around" >
         
           <a href="#" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 bg-info text-center pt-4 mt-4" style="height: 100px; text-decoration: none; font-size: 2em; font-weight: bolder; color: white;" id="addFile">
            
                 ADD FILE
           
           </a>


           <a href="#" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 bg-danger pt-4 mt-4" style="height: 100px; text-align: center; text-decoration: none; font-size: 2em; font-weight: bolder; color: white; " id="viewFile">
            
                 VIEW FILE
           
           </a>


         </div>

       </div>


<!-- TO ADD FILE START FROM HERE-->

     <div class="container" id="theFormForInputFile">
       <div class="row d-flex justify-content-around">
         <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bg-secondary mt-5">
            <div>

              


        <?php

          if (isset($_GET['retrieveStatus']) && $_GET['retrieveStatus'] == 'successful') {
            
            echo "<div class='alert alert-success'>Document Successfully Retrieved</div>";
          } elseif(isset($errorMessageFromAdd)) {
              
              echo "<div class='alert alert-danger'>$errorMessageFromAdd</div>";
          }
        ?>
              <h2 class="text-center" style="font-weight: bolder; font-size: 3em;">ADD FILE</h2>
               <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                 <div class="form-group" align="center" style="font-size: 1.5em;">
                  <!--THE LIST OF USERS WILL BE PULLED OUT FROM THE DATABASE -->
                  <!-- SO THAT THE STORE ADMIN CAN ASSIGN THE FILE TO THE PERSON HE IS GIVE IT TO -->
                  <label>Select Department</label><br>
                   <select style="text-align-last:center; width: 30%; height: 40px; border-radius: 5px;" name="storeFileDept">
                    
                     <option value="noDept">Select Department</option>
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
        <select style="text-align-last:center; width: 30%; height: 40px; border-radius: 5px;" name="userOfFile">

               <option value="noUser">SELECT USER</option>
                 
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
                <input type="text" name="fileToRetrive" class="form-control" placeholder="Enter File No">


                 </div>

                 <div class="form-group">
                   <button type="submit" class="form-control theSubmit" name="storeTheFile">Save</button>
                 </div>

               </form>
            </div>
         </div>
       </div>
     </div>
   <!-- TO ADD FILE ENDS HERE-->



<!-- TO VIEW FILE STARTS FROM HERE -->
    <div class="container" id="tableToDisplayFiles" style="display:none">
      <div class=" row d-flex justify-content-around">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bg-danger mt-5">

          <?php
          if (isset($_GET['deleteStatus']) && $_GET['deleteStatus'] == 'deleted') {
            
            echo "<div class='alert alert-success'>File Succesfuly Deleted</div>";
          }
          ?>

          
          <?php
    if (isset($_GET['theAddStatus']) && $_GET['theAddStatus'] === 'succcessfully') {
    
    echo "<div class='alert alert-success'>Succefull</div>";

    }elseif (isset($errorFileMessage)) {


      echo "<div class='alert alert-danger'>$errorFileMessage</div>";
    }
          ?>
          <h2 class="text-center" style="font-weight: bolder; font-size: 3em;">FILES</h2>

<?php

                
                $logOnUsertheid = loggedInStore();




             //select all from the store_admin table

             $loggedUsertheDet = "SELECT * FROM storefile WHERE storePickerId = $logOnUsertheid ";
  

             $querytheLoggedUser = mysqli_query($db_connection,$loggedUsertheDet);

if (!$querytheLoggedUser) {
  
  die("could not query QUERYLOGGEDUSER" .mysqli_error($db_connection));
}

     $table = "<table class='table table-striped table-bordered'>";
     $table .= "<tr>";
     $table .= "<th>#</th>";
     $table .="<th>File No</th>";
     $table .= "<th>File User</th>";
     $table .= "<th>Picked Date</th>";
     $table .="<th>Delete</th>";
     $table .="<th>Edit</th>";
      
     while ($fetchLogtheUserDet = mysqli_fetch_assoc($querytheLoggedUser)) {
          $table .= "<tr>";
          $table .= "<td></td>";
          $table .= "<td>{$fetchLogtheUserDet['storeFileNo']}</td>";
          $table .= "<td>{$fetchLogtheUserDet['assignedUsers']}</td>";

          $table .= "<td>{$fetchLogtheUserDet['pickUpDate']}</td>";
          
          $table .= "<form method='POST'>";
          $table .= "<td><button type='submit' name='delete-storeFile' class='' onclick = 'return deleteconfig()'>Delete</button></td>";
          $table .= "<td><button name='edit-inventory'><a href='store-edit-file.php?theEditId={$fetchLogtheUserDet['storeFile_id']} '>EDIT</a></button></td>";
          $table .= "<input type='hidden' name='theStoreFileId' value='$fetchLogtheUserDet[storeFile_id]'>";
          $table .= "</form>";
          $table .= "</tr>";
     }

     $table .= "</table>";

     echo $table;



     
?>
        </div>
      </div>
    </div>
<!-- TO VIEW FILE ENDS HERE -->

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

 function deleteconfig() {
    var del = confirm("Are you sure you want to delete");

    if (del == true) {

        alert('Record Delete');
    } else {

        alert('Record Not deleted');
    }

    return del;
}


</script>