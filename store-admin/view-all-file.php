
<?php

  require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-login-store-admin.php");
 require_once('process-store-add-file.php');
 require_once("process-store-edit-file.php");

?>







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


    
<!-- BODY TO DISPAY THE WHOLE FILE STARTS FROM HERE-->

    <section>
       <div class="container-fluid">
         <div class="row d-flex justify-content-around">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bg-danger mt-4">
             <h1 class="text-center">ALL FILES</h1>
    <?php


         $theStoreAdminId = loggedInStore();

         //select department stored for the file, this admin user has
         // then check through the database to select all the details that matches for the department 


         $adminDepartment = "SELECT * FROM storefile WHERE storePickerId = $theStoreAdminId ";




         $queryAdminDepartment = mysqli_query($db_connection,$adminDepartment);




         if (!$queryAdminDepartment) {
           
           die("could not query QUERYADMINDEPARTMENT" . mysqli_error($db_connection));
         }

         $rows = mysqli_num_rows($queryAdminDepartment);




        $fetchTheDepartment = mysqli_fetch_assoc($queryAdminDepartment);



      //then store the department in variable77
      


        $departmentForTheAdmin = $fetchTheDepartment['dept_StoreFile'];


        

        $sql = "SELECT * FROM storefile WHERE dept_StoreFile = '$departmentForTheAdmin' ";



  
        $querysql = mysqli_query($db_connection, $sql);

   



             $table = "<table class='table table-striped table-bordered'>";
             $table .= "<tr>";
             $table .= "<th>#</th>";
             $table .="<th>File No</th>";
             $table .= "<th>File User</th>";
             $table .= "<th>Picked Date</th>";
             $table .="<th>Delete</th>";
             $table .="<th>Edit</th>";
              
           while ($fetchsql = mysqli_fetch_assoc($querysql)) {
                  $table .= "<tr>";
                  $table .= "<td></td>";
                  $table .= "<td>{$fetchsql['storeFileNo']}</td>";
                  $table .= "<td>{$fetchsql['assignedUsers']}</td>";

                  $table .= "<td>{$fetchsql['pickUpDate']}</td>";
                  
                  $table .= "<form method='POST'>";
                  $table .= "<td><button type='submit' name='delete-storeFile' class='' onclick = 'return deleteconfig()'>Delete</button></td>";
                  $table .= "<td><button name='edit-inventory'><a href='store-edit-file.php?theEditId={$fetchsql['storeFile_id']} '>EDIT</a></button></td>";
                  $table .= "<input type='hidden' name='theStoreFileId' value='$$fetchsql[storeFile_id]'>";
                  $table .= "</form>";
                  $table .= "</tr>";
             }

             $table .= "</table>";
             echo $table;
             ?>


            </div>
           
         </div>



       </div>
    </section>

<!-- BODY TO DISPAY THE WHOLE FILE ENDS HERE-->


<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html>

