
<?php

  require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-login-store-admin.php");
 require_once('process-store-add-file.php');
 require_once('process-delete-store-file.php');
 require_once("process-store-edit-profile.php");

?>







<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Store Dashboard</title>

  <style type="text/css">
    
    .submitButtonEdit button{

      width: 250px;
      height: 40px;
      border-radius: 5px;
      border: 2px solid black;
      font-weight: bold;
      background-color: white;
    }

    .submitButtonEdit button:hover{

      border: 2px solid red;
      color: red;
    }
   
     label{

         font-weight: bold;
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
                   <li><a href="store-edit-profie.php">Edit Profile</a></li>
                   <li><a href="store-logout.php">Log Out</a></li>

                 </ul>
               </div>

            </div>

          </div>
         
    <!--HEADER DASHBOARD FOR STORE ENDS HERE -->



<!-- for content start from here -->

    <div class="container-fluid" style="margin-top: 80px;">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bg bg-primary mt-4">



              <?php
                 if (isset($_GET['profileUpdateStatus']) && $_GET['profileUpdateStatus'] == 'done') {
                   
                   echo "<div class='alert alert-success'>Profile Updated</div>";


                 }elseif (isset($profileUpdateErrorMessage)) {
                   echo "<div class='alert alert-danger'>$profileUpdateErrorMessage</div>";
                 }
              ?>


                 <h1 class="text-center">Edit Profile</h1>


                 <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
                   

                     <div class="form-group">
                      <label>Fullname:</label>
                       <input type="text" name="editStoreFullName" class="form-control" value="<?php echo $fetchLogUserDet['store_userFullName'] ?>">
                     </div>

                     <div class="form-group">
                      <label>Username:</label>
                       <input type="text" name="editStoreUserName" class="form-control" value="<?php echo $fetchLogUserDet['store_username'] ?>">
                     </div>

                     <div class="form-group">
                      <label>Email:</label>
                       <input type="text" name="editStoreEmailAdd" class="form-control" value="<?php echo $fetchLogUserDet['store_user_email'] ?>">
                     </div>


                     <div class="form-group" >
                      <label>Department:</label>
                         <select class="form-control" name="editStoreAdminDept">
                             <option value="notAvailable">Select department</option>
                             <option value="Bills">Bills</option>
                             <option value="LC">LC</option>
                             <option value="Non-Valid">Non-Valid</option>
                             <option value="Export">Export</option>
                             <option value="Invisible">Invisble</option>
                         </select>
                     </div>

                   

                     <div class="form-group submitButtonEdit" align='center'>
                       <button type="submit" name="editStoreProfileBut">Edit Profile</button>
                     </div>

                     

                 </form>
            </div>
        </div>
    </div>
<!-- for content ends here -->



<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html>
