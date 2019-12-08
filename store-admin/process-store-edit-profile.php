<?php
 require_once("../database/db_connect.php");
require_once("../handler/handler.php");

    if (isset($_POST['editStoreProfileBut'])) {
    	
    	$profileEditError = array();

    	$storeNameToEdit = sanitize($_POST['editStoreFullName']);

    	$storeUserNameToEdit = sanitize($_POST['editStoreUserName']);

    	$storeEmailToEdit = sanitize($_POST['editStoreEmailAdd']);

       if (isset($_POST['editStoreAdminDept']) && $_POST['editStoreAdminDept'] == 'Bills') {
       	
       	   $theBillsDept = $_POST['editStoreAdminDept'];
       }

       if (isset($_POST['editStoreAdminDept']) && $_POST['editStoreAdminDept'] == 'LC') {
       	
       	   $lcDept = $_POST['editStoreAdminDept'];
       }


       if (isset($_POST['editStoreAdminDept']) && $_POST['editStoreAdminDept'] == 'Non-Valid') {
       	
       	    $theNonValidDept = $_POST['editStoreAdminDept'];
       }

       if (isset($_POST['editStoreAdminDept']) && $_POST['editStoreAdminDept'] == 'Export') {
       	
       	      $exportDept = $_POST['editStoreAdminDept'];
       }

       if (isset($_POST['editStoreAdminDept']) && $_POST['editStoreAdminDept'] == 'Invisible') {
       
          $theInvisibleDept = $_POST['editStoreAdminDept'];
       }


    //check for errors

      if (empty($storeNameToEdit)) {
      	
      	  $profileEditError[] = "Enter your full name";
      }


      if (empty($storeUserNameToEdit)) {
      	
      	$profileEditError[] = "Enter your username";
      }



      if (empty($storeEmailToEdit)) {
      	
      	$profileEditError[] = "Enter your email address";

      }



      if (isset($_POST['editStoreAdminDept']) && $_POST['editStoreAdminDept'] == 'notAvailable') {
      	
      	  $profileEditError[] = "Select your department";
      }


     

   if (empty($profileEditError)) {
   	

   	$getTheProfileId = loggedInStore();


   	   $updateEditStoreProfile = "UPDATE store_admin SET store_userFullName = '$storeNameToEdit', store_username = '$storeUserNameToEdit', store_user_email = '$storeEmailToEdit' , store_user_dept = '".$_POST['editStoreAdminDept']."', store_user_regDate = NOW() WHERE id = $getTheProfileId";


   	   $queryUpdateEditProfile = mysqli_query($db_connection, $updateEditStoreProfile);


   	   if (!$queryUpdateEditProfile) {
   	   	
   	   	die("could not query QUERYUPDATEEDITPROFILE" .mysqli_error($db_connection));
   	   }

   	   header("location:store-edit-profile.php?profileUpdateStatus = done");
   	   exit();

   }  else{

     $profileUpdateErrorMessage = "<ul>";

     foreach ($profileEditError as $profileEditErrors) {
     	
     	$profileUpdateErrorMessage .= "<li>$profileEditErrors</li>";
     }

   $profileUpdateErrorMessage .= "</ul>";
   }




    }
?>