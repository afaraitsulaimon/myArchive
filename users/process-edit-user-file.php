

<?php

  require_once("../database/db_connect.php");
require_once("../handler/handler.php");


   if (isset($_POST['editUserFileButton'])) {
   	    
   	       $errInEditUser = array();

      $file_Id = sanitize($_POST['theFileIdNo']);

   	        if (isset($_POST['editUsers']) && $_POST['editUsers'] == '$rowsOfName[users_FullName]') {


   	       	    $listOfUsers =  $_POST['editUsers'];
   	       	  
   	       }


   	       


   	       if (isset($_POST['editUsers']) && $_POST['editUsers'] == 'noFileUser') {


   	       	    $errInEditUser[]  = "Assign File to a User";
   	       	  
   	       }


//if there is no error 
   	       // then proceed to update file

     
     if (empty($errInEditUser)) {
     	
     	$updateUserFile = "UPDATE storefile SET assignedUsers = '".$_POST['editUsers']."' WHERE storeFile_id = $file_Id ";

     	$queryUpdateUserFile = mysqli_query($db_connection, $updateUserFile);

     	if (!$queryUpdateUserFile) {
     		
     		die("could not query QUERYUPDATEUSERFILE" .mysqli_error($db_connection));
     	}


     header("location:edit-user-file.php?fileEditStatus=successful");
     	exit();

     }else{

     	$editFileErrMessage = "<ul>";

     	foreach ($errInEditUser as $errInEditUsers) {
     		
     		$editFileErrMessage .= "<li>$errInEditUsers</li>";
     	}

     	$editFileErrMessage .= "</ul>";
     }



   }
?>