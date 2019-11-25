<?php

   require_once('../database/db_connect.php');
   require_once('../handler/handler.php');

   if (isset($_POST['editTheFile'])) {
   	
      //STORE ERROR MESSAGE IN AN ARRAY

   	$editError = array();

   	// store the input or selected value in a variable

   
   	

   	  $numberToEdit = sanitize($_POST['fileToRetrive']);
   


   	if (isset($_POST['storeFileEditDept']) && $_POST['storeFileEditDept'] == '$rowsDept[store_user_dept]') {
   		
   		$editTheDepartment  = $_POST['storeFileEditDept'];
   	}
   

   if (isset($_POST['userOfFileEdit']) && $_POST['userOfFileEdit'] == '$row[users_FullName]') {
         
           $theUsersEditName = $_POST['userOfFileEdit'];

   	   }

   	   $theDateOfUpdate = $_POST['updatedDate'];

// get the hidden text input where we store the id

   	   $theRowEditId = $_POST['theFileIdToEdit'];


   	   // check for errors
   	   //if no name was selected or if no department was selected
   	   //and also if the field of the file number is empty
   	   //then throw up an error

   	   if (empty($numberToEdit)) {

   	   	$editError[] = "Enter file number";
   	   }


   if (isset($_POST['storeFileEditDept']) && $_POST['storeFileEditDept'] == 'noEditDept') {

   	   $editError[] = "Select a department";

   }



   if (isset($_POST['userOfFileEdit']) && $_POST['userOfFileEdit'] == 'noEditUser') {
   	
   	$editError[] = "Assign a user to the File";
   }


// if no error occured
   //then update the table you are editing

   if (empty($editError)) {
   	
   	  $updateStoreFile = "UPDATE storefile SET storeFileNo = '$numberToEdit', dept_StoreFile = '". $_POST['storeFileEditDept'] ."', assignedUsers = '". $_POST['userOfFileEdit'] ."', pickUpDate = NOW() WHERE storeFile_id = $theRowEditId ";



   	  $queryUpdateStoreFile = mysqli_query($db_connection, $updateStoreFile);


   	  if (!$queryUpdateStoreFile) {
   	  	
   	  	die("could not query QUERUPDATESTOREFILE" .mysqli_error($db_connection));
   	  }

   	  header("location:store-edit-file.php?updateStatus=successful");
   	  exit();

   }else{

   	  $editStoreFileMess = "<ul>";
   	  foreach ($editError as $editErrors) {
   	  	
   	  	$editStoreFileMess .= "<li>$editErrors</li>";
   	  }

   	  $editStoreFileMess .= "</ul>";
   }




   	  
   }
?>

