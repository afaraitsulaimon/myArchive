<?php

session_start();

   require_once('../database/db_connect.php');
   require_once('../handler/handler.php');
    // check if the login button is clicked
 if (isset($_POST['UserLoginButton'])) {
 	

 	//create variable to store error in array
    //create a variable that stores the input details by users
 	$userLoginError = array();

 	$theUserNameDet = sanitize($_POST['inputuserName']);

 	$thePassCodeDet = sanitize($_POST['users_Password']);

   //select all username and password from users table
 	//so that we can compare inputted one and the one in database

 	$userDet = "SELECT usersUsername,usersPassword FROM users WHERE usersUsername ='$theUserNameDet' AND usersPassword = '$thePassCodeDet' ";

 	$queryUserDet = mysqli_query($db_connection,$userDet);

 	if (!$queryUserDet) {
 	 	
 	 	die("could not query queryUserDet" .mysqli_error($db_connection));
 	 } 

//fetch the details and compare it

 	 $userDetailsFetch = mysqli_fetch_assoc($queryUserDet);

 	 $fetchUserName = $userDetailsFetch['usersUsername'];
 	 $fetchDetailsPass = $userDetailsFetch['usersPassword'];

 	 //if the username and password entered does match with the one in the database, throw the error

 	 if ($fetchUserName != $theUserNameDet && $fetchDetailsPass != $thePassCodeDet) {
 	 	
 	 	$userLoginError[] = "Incorrect Username or Password";
 	 }

 	// check if the input field is empty

 	if (empty($theUserNameDet)) {
 		
 		$userLoginError[] = "Username is required";
 	}
   
    if (empty($theUserNameDet)) {
 		
 		$userLoginError[] = "Password is required";
 	}

//if there is no error encounter 
 	// then proceed to allow eneter into the dashboard of the user
    if (empty($userLoginError)) {
    	
    	$sqlForUserLog = "SELECT * FROM users WHERE usersUsername ='$theUserNameDet' AND usersPassword = '$thePassCodeDet'";

    
        $queryForUserLog = mysqli_query($db_connection,$sqlForUserLog);

        if (!$queryForUserLog) {
        	
        	die("could not query queryForUserLog" .mysqli_error($db_connection));
        }


        //count the number of rows found when you log

        $countUserRow = mysqli_num_rows($queryForUserLog);

//if the number of row found in the database is 1
 // then fetch the details
        // and store the user id as a session 


        if ($countUserRow = 1) {
        	
        $fetchForUsers = mysqli_fetch_assoc($queryForUserLog);

        $_SESSION['userLoggedInId'] = $fetchForUsers['user_id'];


        header("location:users-dashboard.php");
        exit();
        }

      
    }else{

    	$loginErrUserMessage = "<ul>";

    	foreach ($userLoginError as $userLoginErrors) {
    		
    		$loginErrUserMessage .=  "<li>$userLoginErrors</li>";
    	}

    	$loginErrUserMessage .= "</ul>";
    }




 }
?>