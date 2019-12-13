<?php

session_start();

   require_once('../database/db_connect.php');
    require_once('../handler/handler.php');
    
// CHECK IF THE SUBM7IT BUTTON IS CLICKED
   if (isset($_POST['storeUserLoginButton'])) {
   	

   // STORE THE ERROR IN AN ARRAY FIRST
   	// THEN CREATE A VARIABLE TO TAKE THE INPU7T VALUE BY THE USERS

   	// CHECK IF THE 2 FIELDS ARE EMPTY

   	$storeLoginError = array();

   	$theStoreUserLogin = sanitize($_POST['storeUserName']);
    $theStoreUserLoginPass = sanitize($_POST['storeUserPw']);


    if (empty($theStoreUserLogin)) {
    	
    	$storeLoginError[] = "Username require to Login";
    }

    if (empty($theStoreUserLoginPass)) {
    	
    	$storeLoginError[] = "Password require to Login";
    }







// select all from the database
    // check if the details entered is available in the database
    

    $checkDetailsMatch = "SELECT * FROM store_admin WHERE store_username = '$theStoreUserLogin' AND store_user_password ='$theStoreUserLoginPass' ";

	$queryCheck = mysqli_query($db_connection,$checkDetailsMatch);



    // fetch the details
		$fetchUsers = mysqli_fetch_assoc($queryCheck);


// fetch the username and the password
		// then compare with the inputted 
    $storeUsername = $fetchUsers['store_username'];
    $storeUserPassCode = $fetchUsers['store_user_password'];


      if ($storeUsername !== $theStoreUserLogin && $storeUserPassCode !== $theStoreUserLoginPass) {

      	$storeLoginError[] = "Incorrect Username and Password";

      }
      	


// if there is no error
    

if (empty($storeLoginError)) {
	
	$storeLoginSql = "SELECT * FROM store_admin WHERE store_username = '$theStoreUserLogin' AND store_user_password ='$theStoreUserLoginPass' ";


  // if the details supplied does not exist in our database, throw out error

	$query_StoreLogin = mysqli_query($db_connection,$storeLoginSql);




	if (!$query_StoreLogin) {

		die("could not query query_StoreLogin" .mysqli_error($db_connection));

	}

	// check how many rows was found

	$countRows = mysqli_num_rows($query_StoreLogin);



	if ($countRows = 1) {
		
		// fetch the details
		$fetchStoreUserDet = mysqli_fetch_assoc($query_StoreLogin);

		


		// THEN STORE THE ID FROM THE STORE_ADMIN TABLE WHICH IS id IN A SESSION['storeAdmin_id']

             	$_SESSION['storeAdmin_id'] = $fetchStoreUserDet['id'];


             	//THEN IF THE ABOVE IS SUCCESSFUL
             	// REDIRECT TO THE VENDOR INDEX PAGE 


   header("location:store-dashboard.php");
   exit();
	}
}else{


  $storeLoginErrMessage = "<ul>";

  foreach ($storeLoginError as $storeLoginErrors) {
    
       $storeLoginErrMessage .= "<li>$storeLoginErrors</li>";
  }

  $storeLoginErrMessage .= "</ul>";
}














   }

?>