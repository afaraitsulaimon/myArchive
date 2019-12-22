<?php

   if (isset($_POST['userEditBut'])) {



     $exportUsersEditErr = array();

  	  $exportUser_FullName = sanitize($_POST['nameOfUser']);
  	  $exportUser_UserName = sanitize($_POST['usernameOfUser']);
  	  $exportUser_Email = sanitize($_POST['emailOfUser']);
  	  $exportUsers_Id = sanitize($_POST['usersId']);




  	  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'LC') {
  	  	
  	  	   $thefileUserLc = $_POST['fileUserDept'];
  	  }

  	  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'Bills') {
  	  	
  	  	   $thefileUserBills = $_POST['fileUserDept'];
  	  }


  	  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'Invisible') {
  	  	
  	  	   $thefileUserInvisible = $_POST['fileUserDept'];
  	  }


  	  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'Non-Valid') {
  	  	
  	  	   $thefileUserNonValid = $_POST['fileUserDept'];
  	  }


  	  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'Export') {
  	  	
  	  	   $thefileUserExport = $_POST['fileUserDept'];
  	  }



  	  //check for errors


  	    	  if (empty($exportUser_FullName)) {

  	    	  	$exportUsersEditErr[] = "Enter a Fullname";
  	    	  }

  	    	  if (empty($exportUser_UserName)) {

  	    	  	$exportUsersEditErr[] = "Enter a Username";
  	    	  }



  	    	  if (empty($exportUser_Email )) {

  	    	  	$exportUsersEditErr[] = "Enter an Email Address";
  	    	  }


  	    	  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'deptNotPicked') {
  	    	  	
  	    	  	  $exportUsersEditErr[] = "Select a Department";
  	    	  }



      if (empty($exportUsersEditErr)) {
      	
      	 $updateExportUsers = "UPDATE users SET users_FullName	= '$exportUser_FullName', usersUsername = '$exportUser_UserName', users_email ='$exportUser_Email', users_department = '".$_POST['fileUserDept']."' , usersRegDate = NOW() WHERE user_id = $lcUsers_Id ";

      	 $queryUpdateExportUsers = mysqli_query($db_connection, $updateExportUsers);

      	 if (!$queryUpdateExportUsers) {
      	 	
      	 	die("could not query QUERYUPDATEEXPORTUSERS" .mysqli_error($db_connection));
      	 }

      	 header("Location:edit-fileusers-admin.php?userExportEdited=done");
      	 exit();


      }else{

       $errorMessExportUserEdit = "<ul>";

       foreach ($exportUsersEditErr as $exportUsersEditErrors) {
       
         $errorMessExportUserEdit .= "<li>$exportUsersEditErrors</li>";
       }

       $errorMessExportUserEdit .= "</ul>";



   }

?>