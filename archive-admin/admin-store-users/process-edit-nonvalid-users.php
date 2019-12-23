<?php
   if (isset($_POST['userEditBut'])) {
   	
   	     $nonValidUsersEditErr = array();

  	  $nonValidUser_FullName = sanitize($_POST['nameOfUser']);
  	  $nonValidUser_UserName = sanitize($_POST['usernameOfUser']);
  	  $nonValidUser_Email = sanitize($_POST['emailOfUser']);
  	  $nonValidUsers_Id = sanitize($_POST['usersId']);


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
      if (empty($nonValidUser_FullName)) {
      	$nonValidUsersEditErr[] = "Enter Fullname";
      }
  
     if (strlen($nonValidUser_FullName) <= 6) {
     	
     	$nonValidUsersEditErr[] = "Letters must be longer than 6";

     }

      if (empty($nonValidUser_UserName)) {
      	$nonValidUsersEditErr[] = "Enter Username";
      }


      if (empty($nonValidUser_Email)) {
      	$nonValidUsersEditErr[] = "Enter an email address";
      }


  	  

  	  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'deptNotPicked') {
  	  	
  	  	  $nonValidUsersEditErr[] = "Select a Department";
  	  }


     if (empty($nonValidUsersEditErr)) {
     	
     	$updateNonValidUsers = "UPDATE users SET users_FullName	= '$nonValidUser_FullName', usersUsername = '$nonValidUser_UserName', users_email ='$nonValidUser_Email', users_department = '".$_POST['fileUserDept']."' , usersRegDate = NOW() WHERE user_id = $nonValidUsers_Id ";

     	$queryUpdateNonValid = mysqli_query($db_connection, $updateNonValidUsers);

     	if (!$queryUpdateNonValid) {
     		
     		die("could not query QUERY UPDATE NON VALID" .mysqli_error($db_connection));
     	}


     	header("Location:edit-fileusers-admin.php?userNonValidEdited = success");
     	exit();
     }else{

     	$errorMessNonValidUserEdit = "<ul>";

    foreach ($nonValidUsersEditErr as $nonValidUsersEditErrors) {

    	$errorMessNonValidUserEdit .= "<li></li>";
    }

    $errorMessNonValidUserEdit .= "</ul>";
     }





   }

?>