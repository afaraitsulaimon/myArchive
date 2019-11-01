<?php
   require_once('../database/db_connect.php');
   require_once('../handler/handler.php');

   //check if the register button has being clicked

   if (isset($_POST['userRegister-submit'])) {
   	
   	  // create a variable to store all the error as an array()
    // store the input value for each field in a variables


    $userRegError = array();

    $theUsersFullName = sanitize($_POST['usersFullName']);
    $theUsers_username = sanitize($_POST['usernameReg']);
    $theUsersEmailReg = sanitize($_POST['userRegEmail']);

      if (isset($_POST['usersDept']) && $_POST['usersDept'] == 'Bills') {
      	$theUsersDepartment = $_POST['usersDept'];
      }



      if (isset($_POST['usersDept']) && $_POST['usersDept'] == 'LC') {
      	     $theUsersDepartment = $_POST['usersDept'];
      }


      if (isset($_POST['usersDept']) && $_POST['usersDept'] == 'Non-Valid') {
      	$theUsersDepartment = $_POST['usersDept'];
      }



      if (isset($_POST['usersDept']) && $_POST['usersDept'] == 'Export') {
      	     $theUsersDepartment = $_POST['usersDept'];
      }



      if (isset($_POST['usersDept']) && $_POST['usersDept'] == 'Invisible') {
      	$theUsersDepartment = $_POST['usersDept'];
      }



      if (isset($_POST['usersDept']) && $_POST['usersDept'] == 'ADA-Scan') {
      	     $theUsersDepartment = $_POST['usersDept'];
      }



      $theUsersRegPass = sanitize($_POST['userRegPassCode']);
     $theUsersConfRegPass = sanitize($_POST['userRegConfPassCode']);
      

      //check if the input field is empty 
     //Also check if the length of the password is okay 
     // and if the password entered matches each other

     if (empty($theUsersFullName)) {
     	
     	$userRegError[] = "Full name is needed";
     }


     if (empty($theUsers_username)) {
     	
     	$userRegError[] = "Username is needed";
     }


     if (empty($theUsersEmailReg)) {
     	
     	$userRegError[] = "Email address is needed";
     }



if (!isset($_POST['usersDept']) || $_POST['usersDept'] == 'null') {

	$userRegError[] = "Select Department";

}




     if (empty($theUsersRegPass)) {
     	
     	$userRegError[] = "Password is required";
     }


     if (empty($theUsersConfRegPass)) {
     	
     	$userRegError[] = "Confirm Password is required";
     }

    if (strlen($theUsersRegPass) <= 6) {
    	
    	$userRegError[] = "Password should be more 6 letters";
    }

//check is there is no error, so proceed to insert into database

    if (empty($userRegError)) {
    	
   $userRegSql = "INSERT INTO users(users_FullName,usersUsername,users_email,users_department,usersPassword,usersRegDate) VALUES('$theUsersFullName','$theUsers_username','$theUsersEmailReg','$theUsersDepartment','$theUsersRegPass',NOW())";



      
      $query_userReg = mysqli_query($db_connection,$userRegSql);


  if (!$query_userReg) {
  	
  	die("could not query query_userReg" .mysqli_error($db_connection));
  }




header("location:user-login-reg.php?feedback=success");
exit();

    }else{


    	$userErrorMessage = "<ul>";

    	foreach ($userRegError as $userRegErrors) {
    		
    		$userErrorMessage .= "<li>$userRegErrors</li>";
    	}

    	$userErrorMessage .="</ul>";
    }










   }

?>