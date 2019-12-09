<?php
   require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-users-login.php");
 require_once("process-edit-user-file.php");


?>

<?php notLoggedInUser() ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link href="https://fonts.googleapis.com/css?family=Solway&display=swap" rel="stylesheet">

<style type="text/css">
    .edituserFile{

        margin-top: 70px;
    }

  .edituserFile label{
        font-size: 1.5em;
  }

   .edituserFile input[type='text']{

    width: 350px;
    height: 40px;
    font-size: 1.5em;
  }


 .edituserFile select{

    width: 350px;
    height: 40px;
    font-size: 1.5em;
  }


.edituserFile button{

    width: 200px;
    height: 40px;
    font-weight: bold;
    margin-top: 20px;
    border-radius: 5px;
    border: 0px solid;
    
  }

  .edituserFile button:hover{

    
   border: 2px solid red;
    
  }



</style>

	<title>Edit User File</title>
</head>
<body>
	<!-- USER DASHBOARD HEADER STARTS FROM HERE  -->
	<div class="container-fluid ">
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
                     <li><a href="store-change-pw.php">Change Password</a></li>
                     <li><a href="#">Edit Profile</a></li>
                     <li><a href="users-logout.php">Log Out</a></li>

                   </ul>
       	    </div>	
       </div>
		
	</div>
	<!-- USER DASHBOARD ENDS HERE  -->



            <div class="container-fluid">
                <div class="row d-flex justify-content-around">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="margin-top: 100px; ">
                        <h1 class="text-center" style="font-size: 4em; font-family: 'Solway', serif;">Edit File</h1>

                    </div>
                </div>
            </div>


   <!-- edit file by user start from here-->
   <div class="container-fluid edituserFile">
       <div class="row d-flex justify-content-around">
        <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-7 bg-info">

            <?php
                
                if (isset($_GET['fileEditStatus']) && $_GET['fileEditStatus'] == 'successful') {
                    
                    echo "<div class = 'alert alert-success'>Successfully Edited</div>";
                }elseif (isset($editFileErrMessage)) {
                    
                    echo "<div class='alert alert-danger'>{$editFileErrMessage}</div>";
                }

            ?>
  
              <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" align=center>

               
           <div class="form-group">
            <label>File Number:</label><br>
               <input type="text" name="editFileNumber" value=" <?php
                 if (isset($_GET['userEditId'])) {
                     
                     $theUserFileId = $_GET['userEditId'];

                     $userfileToEdit = "SELECT * FROM storefile WHERE storeFile_id = $theUserFileId";



                     $queryUserFileToEdit = mysqli_query($db_connection, $userfileToEdit);

                     if (!$queryUserFileToEdit) {
                         
                         die("could not query QUERYUSERFIETOEDIT" .mysqli_error($db_connection));
                     }


                     $fetchUserEditFile = mysqli_fetch_assoc($queryUserFileToEdit);

                     $theUserDept = $fetchUserEditFile['dept_StoreFile'];

                     echo $fetchUserEditFile['storeFileNo'];

                 }
                ?>" name='fileNoToEdit'>
           </div>

           <div class="form-group">
            <label>Assign User:</label><br>
               <select name="editUsers">
                   <option value="noFileUser">Select User</option>
                  
                       <?php
                       $nameOfUsers = "SELECT * FROM users WHERE users_department = '$theUserDept' ";

                       $queryNameOfUsers = mysqli_query($db_connection,$nameOfUsers);

                       if (!$queryNameOfUsers) {
                           
                           die("could not query QUERYNAMEOFUSERS" .mysqli_error($db_connection));
                       }

                       $rowsOfName = mysqli_num_rows($queryNameOfUsers);

                       while ($rowsOfName = mysqli_fetch_assoc($queryNameOfUsers)) {
                           
                           echo "<option value = '".$rowsOfName['users_FullName'] ."'>" . $rowsOfName['users_FullName']."</option>";
                       }
                       ?>
                

               </select>
           </div>

         <div class="form-group">
             <input type="hidden" value="<?php if(isset($_GET['userEditId'])){

                                  
                               $theUserFileId = $_GET['userEditId'];

        $idOfUser = "SELECT * FROM storefile WHERE storeFile_id = $theUserFileId";

        $queryidOfUser = mysqli_query($db_connection, $idOfUser);

             
             $fetchidOfUser = mysqli_fetch_assoc($queryidOfUser);

              echo $fetchidOfUser['storeFile_id'];

             }   ?>"  name="theFileIdNo">
         </div>


           <div class="form-group">
               <button type="submit" name="editUserFileButton">Edit</button>
           </div>
              </form>


        </div>
           
       </div>

   </div>

   <!-- edit file by user end here-->







	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html> 