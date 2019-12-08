<?php
    require_once("../database/db_connect.php");
   require_once("../handler/handler.php");


   if (isset($_POST['storeChangepwBut'])) {
   	     
   	     $storeChangePwErr = array();

   	     $theStoreCurrentPw = sanitize($_POST['storeCurrentPw']);

         $theStoreNewPw = sanitize($_POST['storeNewPw']);

         $thestoreConfirmNewPw  = sanitize($_POST['storeConfirmNewPw']);


         //check for error

         if (empty($theStoreCurrentPw)) {
         	
         	$storeChangePwErr[] = "Enter your Current Password";
         }

         if (empty($theStoreNewPw)) {
         	
         	$storeChangePwErr[] = "Enter your new password";
         }


         if (empty($thestoreConfirmNewPw)) {
         	
         	$storeChangePwErr[] = "Confirm your new password";
         }


       if ($theStoreNewPw !== $thestoreConfirmNewPw) {

       	$storeChangePwErr[] = "New password does not match";
       }




       if (strlen($theStoreNewPw) <= 6) {
       	
       	    $storeChangePwErr[] = "Password too short";

       }
   

       

       $idForStoreAdmin = loggedInStore();

       $store_adminPw = "SELECT * FROM store_admin WHERE id = $idForStoreAdmin";


       $queryStore_adminPw = mysqli_query($db_connection,$store_adminPw);

       if (!$queryStore_adminPw) {
       	
       	die("could not query " .mysqli_error($db_connection));
       }


       $fetchStoreAdmin_PassCode = mysqli_fetch_assoc($queryStore_adminPw);


       $theIdForTheStoreAdmin = $fetchStoreAdmin_PassCode['store_user_password'];

       
       //check if the currect password, does not match with the one in the database
       //then display error


      if ($theStoreCurrentPw !== $theIdForTheStoreAdmin) {
      	
      	$storeChangePwErr[] = "Current password incorrect";

      }
  

  



      //if no error found
      //then change the paasword

      if (empty($storeChangePwErr)) {
      	
      	$changeStoreAdmin_pw = "UPDATE store_admin SET store_user_password = '$theStoreNewPw' WHERE id = $idForStoreAdmin";

      	

      	$queryChangeStoreAdminPw = mysqli_query($db_connection,$changeStoreAdmin_pw);


      	if (!$queryChangeStoreAdminPw) {
      		
      		die("could not query queryChangeStoreAdminPw " .mysqli_error($db_connection));
      	}


      	header("location:store-login-reg.php?storeChangePassCode=success");
      	exit();

      }else{

      	$storePwChangeErrMessage = "<ul>";

      	foreach ($storeChangePwErr as $storeChangePwErrs) {
      		
      		$storePwChangeErrMessage .= "<li>$storeChangePwErrs</li>";
      	}

      	$storePwChangeErrMessage .= "</ul>";
      }




   }
?>