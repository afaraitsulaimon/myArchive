<?php
session_start();
   require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-users-login.php");
 require_once("process-users-change-pw.php");
 require_once("process-users-edit-profile.php");


?>

<?php notLoggedInUser() ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


<style type="text/css">

	.buttonForEditing button{

    width: 200px;
    height: 40px;
    border-radius: 5px;
    border: 2px solid black;
    font-weight: bold;
  }

    .buttonForEditing button:hover{

      
      border: 2px solid red;
      color: red;
    }
    
    label{

      font-weight: bold;
    }

	


</style>
	<title>Users Edit Profile</title>
</head>
<body>
	<!-- USER DASHBOARD HEADER STARTS FROM HERE  -->
	<div class="container-fluid">
       <div class="row">
       	  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg bg-info">


                <!-- STORE THE SESSION ID OF THE LOG IN USER-->
              <?php

                $theLogInUser = loggedInUser();

               
                //select all from where the login user is

                $usersDetails = "SELECT * FROM users WHERE user_id = $theLogInUser ";



                $queryUsersDetails = mysqli_query($db_connection, $usersDetails);


                if (!$queryUsersDetails) {
                	
                	die('could not query QUERYUSERSDETAILS' .mysqli_error($db_connection));
                }

                //fetch the details and display the user full name


                $fetchUsersDetails = mysqli_fetch_assoc($queryUsersDetails);

                $fetchUsers_FullName = $fetchUsersDetails['users_FullName'];

                $fetchUsers_UserName = $fetchUsersDetails['usersUsername'];

                echo "<a href='users-dashboard.php'>$fetchUsers_FullName</a>";

                ?>
                
       	  </div>



       	    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bg-primary">
                    <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle = "dropdown" style="float: right;"><?php echo "$fetchUsers_UserName"; ?></a>
                   <ul class="dropdown-menu">
                     <li><a href="users-change-pw.php">Change Password</a></li>
                     <li><a href="#">Edit Profile</a></li>
                     <li><a href="users-logout.php">Log Out</a></li>

                   </ul>
       	    </div>	
       </div>
		
	</div>
	<!-- USER DASHBOARD ENDS HERE  -->

  
   <!-- edit profile form starts from here -->

      <div class="container-fluid" style="margin-top: 150px;">
        <div class="row  d-flex justify-content-around">
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bg bg-primary">

            <?php

                if (isset($_GET['profileUpdateStatus']) && $_GET['profileUpdateStatus'] == 'great') {
                  
                      echo "<div class='alert alert-success'>Profile Successfully Updated</div>";
                }elseif (isset($userUpdateErrMessage)) {
                  
                  echo "<div class='alert alert-danger'>$userUpdateErrMessage</div>";
                }
            ?>
               
               <h1 class="text-center">Edit User Profile</h1>
             <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
               
                 <div class="form-group">
                  <label>Fullname:</label>
                   <input type="text" name="editUserFullName" class="form-control" value="<?php echo $fetchUsersDetails['users_FullName']; ?>">
                 </div>

                 <div class="form-group">
                  <label>Username:</label>
                   <input type="text" name="editUser_username" class="form-control" value="<?php echo $fetchUsersDetails['usersUsername']; ?>">
                 </div>

                 <div class="form-group">
                  <label>Email Address:</label>
                   <input type="text" name="editUserEmail" class="form-control" value="<?php echo $fetchUsersDetails['users_email']; ?>">
                 </div>

                 <div class="form-group">
                  <label>Department:</label>
                   <select class="form-control" name="editUserDepartment">
                    <option value="noEditDepartment">Select Department</option>
                     <option value="Bills">Bills</option>
                     <option value="LC">LC</option>
                     <option value="Non-Valid">Non-Valid</option>
                     <option value="Export">Export</option>
                     <option value="Invisible">Invisible</option>
                     <option value="ADA">ADA</option>
                   </select>
                 </div>

                <div class="form-group buttonForEditing" align="center">
                   <button type="submit" name="userEditProfileButton">Edit Profile</button>
                 </div>

             </form>
           </div>
        </div>
      </div>

   <!-- edit profile form ends here -->


	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html> 