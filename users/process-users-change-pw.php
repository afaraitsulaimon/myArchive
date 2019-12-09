<?php



   if (isset($_POST['userChangepwBut'])) {
   	    
      	   $errorUserChangePw = array();


      	   $userCurrentPassCode = sanitize($_POST['userCurrentPw']);

      	   $theUserNewPassCode = sanitize($_POST['userNewPw']);

      	   $theUserConfirmCode = sanitize($_POST['userConfirmNewPw']);


      	   //check for error

         

      	   if (empty($userCurrentPassCode)) {

      	   	   $errorUserChangePw[] = "Enter you current password";
      	   }

      	   if (empty($theUserNewPassCode)) {
      	   	   $errorUserChangePw[] = "Enter your new password";
      	   }


      	   if (empty($theUserConfirmCode)) {
      	   	   $errorUserChangePw[] = "Confirm your new password";
      	   }

      	   if (strlen($theUserNewPassCode) <= 6) {
      	   	$errorUserChangePw[] = "Password too short";

      	   }

      	   if ($theUserNewPassCode !== $theUserConfirmCode) {

      	   	$errorUserChangePw[] = "New password does not match";
      	   }


      	  



         $usersLogOnId = loggedInUser();

         $getTheUserPw = "SELECT * FROM users WHERE user_id = $usersLogOnId";

         $queryGetUserPw = mysqli_query($db_connection, $getTheUserPw);

         if (!$queryGetUserPw) {
         	
         	die("could not query QUERYGETUSERPW" .mysqli_error($db_connection));
         }


         $fetchUsersPw = mysqli_fetch_assoc($queryGetUserPw);

         $theUsers_Password = $fetchUsersPw['usersPassword'];

         //check if the input password is the same with the one in the database


         if ($userCurrentPassCode !== $theUsers_Password) {
         	    
         	    $errorUserChangePw[] = "Current Password is Incorrect";
         }



         if (empty($errorUserChangePw)) {
         	
         	$updateUsersPassCode = "UPDATE users SET usersPassword = '$theUserNewPassCode' WHERE user_id = $usersLogOnId ";

         	$queryUpdateUsersPass = mysqli_query($db_connection, $updateUsersPassCode);

         	if (!$queryUpdateUsersPass) {
         		
         		die("could not query QUERYUPDATEUSERSPASS" .mysqli_error($db_connection));
         	}


         	  header("location:user-login-reg.php?userChangePassStatus=good");
         	  exit();
         }else{

         	$errorMessageChangePw = "<ul>";

         	foreach ($errorUserChangePw as $errorUserChangePws) {
         		$errorMessageChangePw .= "<li>$errorUserChangePws</li>";
         	}

         	$errorMessageChangePw .= "</ul>";

         }




   }

?>