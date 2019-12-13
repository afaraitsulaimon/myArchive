<?php
session_start();
   require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-users-login.php");
 require_once("process-users-change-pw.php");


?>

<?php notLoggedInUser() ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


<style type="text/css">

	input[type="text"]{

		margin-top: 50px;
	}

		


	.userFindFile button{

		width: 200px;
		height: 40px;
		background-color: grey;
		border: 2px solid white;
		border-radius: 10px;
		margin: 5px;
		font-size: 1.2em;
		font-weight: bold;
	}


	.userFindFile button:hover{

		background-color: red;
		border: 2px solid white;
		color: white;
	
		
	}


</style>
	<title>Users Dashboard</title>
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

  
    <!--  the form to change user password starts here -->


    <div class="container-fluid">
  <div class="row d-flex justify-content-around">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-5 bg bg-primary">
      
      <?php
         if (isset($errorMessageChangePw)) {
             
             echo "<div class='alert alert-danger'>{$errorMessageChangePw}</div>";
         }
      ?>
    


           <h1 class="text-center pt-5">User Change Password</h1>

           
           <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
             <div class="form-group">
               <label>Current Password:</label>
               <input type="password" name="userCurrentPw" placeholder="Current Password" class="form-control">

             </div>


             <div class="form-group">
               <label>New Password:</label>
               <input type="password" name="userNewPw" placeholder="New Password" class="form-control">
             </div>

             <div class="form-group">
               <label>Confirm New Password:</label>
               <input type="password" name="userConfirmNewPw" placeholder="New Password" class="form-control">
             </div>

             <div class="form-group" align="center">
               <input type="submit" name="userChangepwBut" class="btn btn-info btn-lg mt-3" value="Change Password">
             </div>
           </form>
    </div>
  </div>
</div>
<!--  the form to change user password ends here -->





	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html> 