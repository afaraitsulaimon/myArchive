<?php
      require_once("../database/db_connect.php");
      require_once("../handler/handler.php");


      if (isset($_POST['pCodeRecoverButton'])) {
      	
      	$pwRecoverError_store = array();

      	//store the value input in a variable

      	$theStorePwRecovery = sanitize($_POST['storeForgetPcode']);



      	//checck if the input field to enter the email is empty

      	if (empty($theStorePwRecovery)) {
      		
      		$pwRecoverError_store[] = "Email address is required";
      	}

      	
    

      	//if empty error
      	//that means if no error was found
      	// then proceed to send the email to the fetched email from the database

      	if (empty($pwRecoverError_store)) {
      		
      		//select all from the database and check if the emmail exit
      	//if the eamil does not exist, throw out an error

      	$forgetStoreSql = "SELECT * FROM store_admin WHERE 	store_user_email = '$theStorePwRecovery' ";

      	$forgetStoreQuery = mysqli_query($db_connection, $forgetStoreSql);

      	if (!$forgetStoreQuery) {
      		
      		die("could not query forgetStoreQuery" .mysqli_error($db_connection));
      	}

      	$forgetStoreFetch = mysqli_fetch_assoc($forgetStoreQuery);
        
         // email fetched from the database

      	$emailFetched = $forgetStoreFetch['store_user_email'];

      	//fetch the user name

      	$nameFetched = $forgetStoreFetch['store_userFullName'];

      	//compare if the email entered does not match with any of the email in the database
      	//then shout out an error for the user to see 

      	if ($theStorePwRecovery !== $emailFetched) {
      		
      		$pwRecoverError_store[] = "Email not available";

      	}


      	if ($theStorePwRecovery === $emailFetched) {
      		//if $theStorePwRecovery is the same as $emailFetched
      		//generate a random alphanumeric letters 
      		// and save as password
      		//then send to the user to logon and then change the password to a more convinient one


      		     $genStoreNewPassCode = substr(base_convert(sha1(uniqid(mt_rand())),16, 36), 0 );

      		$to = "$emailFetched";
      		$headers = "admin@myarchive.com";
            $subject = "Your Password Recovery from Myarchive.com";

            $body = "Hi '$nameFetched' , nn You or someone have requested your account details. nn Here is your account details, nn  Your password is $genNewPassCode nn Your password has being reset and that is your new pass word nn proceed to your login page, login with the your username and new password , nn then proceed to change your password to a convinient one. nn Regards Site Admin  ";

           mail($to, $subject, $body, $headers);

            //THEN UPDATE THE GENERATED PASSCODE INTO THE DATABASE

      		     $updateThePassCode = "UPDATE store_admin SET store_user_password = '$genStoreNewPassCode' WHERE store_user_email = '$theStorePwRecovery' ";

      		     

      		     $queryTheStoreUpdate = mysqli_query($db_connection,$updateThePassCode);
              

      		     header("location:store-forgetpw.php?thestatus=successNewPw");
      		     exit();
      	}




      	}else{
             
             $messageErrFgtPw = "<ul>";

   foreach ($pwRecoverError_store as $pwRecoverError_stores){
   $messageErrFgtPw .=  "<li>pwRecoverError_stores</li>";


   }
          $messageErrFgtPw .= "</ul>";

      	
    }



      }

?>



77