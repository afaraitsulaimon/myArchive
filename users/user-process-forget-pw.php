<?php


   require_once("../database/db_connect.php");
   require_once("../handler/handler.php");
   if (isset($_POST['userRecoverPwButton'])) {
   	
         
     //store the error in an array

   	$errorFromForgtPcode = array();

   	// store the input from the text box

   	$theInputEmail = sanitize($_POST['userForgetPcodeEmail']);

   //check if the field is empty

   	if (empty($theInputEmail)) {
   		
   		$errorFromForgtPcode[] = "Enter your email address";
   	}
    
    //if there is no error of empty field
    //select all from the database 
    if (empty($errorFromForgtPcode)) {
    	
    	$sqlUsersFgtPwDet = "SELECT * FROM users WHERE users_email = '$theInputEmail' ";

    	$queryUsers = mysqli_query($db_connection, $sqlUsersFgtPwDet);

     if (!$queryUsers) {
     	
     	die("could not query QUERYUSERS" .mysqli_error($db_connection));

     }
    	
 
$row = mysqli_num_rows($queryUsers);


if ($row == 0) {

	$errorFromForgtPcode[] = "Email isnot existing";
}
 //fetch the user email address and also the user full name

     $fetchUsersDetails = mysqli_fetch_assoc($queryUsers);

     //store the emailand full name in a variable
     //then compare the email with the one inputted

     $email_Users = $fetchUsersDetails['users_email'];
     $fullName_Users = $fetchUsersDetails['users_FullName'];




   
     
//check if the iputted emailis found in the database
//then generate a alphanumeric number when the email entered is available in the database
//then send the email with the alphanumeric to the email
//And also update the user password with the genearted alphanumeric pw

     if ($theInputEmail === $email_Users) {
     	
     			     $genNewUserPw = substr(base_convert(sha1(uniqid(mt_rand())),16, 36), 0 );

     			$to = "$email_Users";
     			$headers = "admin@myarchive.com";
     	      $subject = "Your Password Recovery from Myarchive.com";

     	      $body = "Hi '$fullName_Users' , nn You or someone have requested your account details. nn Here is your account details, nn  Your password is $genNewUserPw nn Your password has being reset and that is your new pass word nn proceed to your login page, login with the your username and new password , nn then proceed to change your password to a convinient one. nn Regards Site Admin  ";

     	     mail($to, $subject, $body, $headers);

     	     //then update the user table with the alphanumeric

     	     $updateUserTable = "UPDATE users SET usersPassword = $genNewUserPw WHERE users_email = '$theInputEmail' ";

     	     $queryUpdateUserPw = mysqli_query($db_connection,$updateUserTable);

     	     if (!$queryUpdateUserPw) {
     	     	
     	     	die("could not query QUERYUPDATEUSERPW" .mysqli_error($db_connection));


     	     }
          
          header("location:user-forgetpw.php?pwStatus=theSuccess");
          exit();
     }





    }else{

    	$errorPwUserMessage = "<ul>";


foreach ($errorFromForgtPcode as $errorFromForgtPcodes) {

	$errorPwUserMessage .= "<li>$errorFromForgtPcodes</li>";

}    	

    	$errorPwUserMessage .= "</ul>";
    }








   }

?>