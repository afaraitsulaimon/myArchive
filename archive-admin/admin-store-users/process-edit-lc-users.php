<?php

  if (isset($_POST['userEditBut'])) {
  	  
  	  $lcUsersEditErr = array();

  	  $lcUser_FullName = sanitize($_POST['nameOfUser']);
  	  $lcUser_UserName = sanitize($_POST['usernameOfUser']);
  	  $lcUser_Email = sanitize($_POST['emailOfUser']);
  	  $lcUsers_Id = sanitize($_POST['usersId']);

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


  	  if (empty($lcUser_FullName)) {

  	  	$lcUsersEditErr[] = "Enter a Fullname";
  	  }

  	  if (empty($lcUser_UserName)) {

  	  	$lcUsersEditErr[] = "Enter a Username";
  	  }



  	  if (empty($lcUser_Email )) {

  	  	$lcUsersEditErr[] = "Enter an Email Address";
  	  }


  	  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'deptNotPicked') {
  	  	
  	  	  $lcUsersEditErr[] = "Select a Department";
  	  }

    
    //when no error is found
  	  if (empty($lcUsersEditErr)) {
  	  	
  	  	  $updateLcUsers = "UPDATE users SET users_FullName	= '$lcUser_FullName', usersUsername = '$lcUser_UserName', users_email ='$lcUser_Email', users_department = '".$_POST['fileUserDept']."' , usersRegDate = NOW() WHERE user_id = $lcUsers_Id ";

  	  	  $queryUpdateLcUsers = mysqli_query($db_connection, $updateLcUsers);

  	  	  if (!$queryUpdateLcUsers) {
  	  	  	
  	  	  	die("could not query QUERYUPDATELCUSERS" .mysqli_error($db_connection));
  	  	  }

  	  	  header("Location:edit-fileusers-admin.php?userLcEdited=done");
  	  	  exit();
  	  }else{

       $errorMessageLcUserEdit = "<ul>";

       foreach ($lcUsersEditErr as $lcUsersEditErrors) {
       
         $errorMessageLcUserEdit .= "<li>$lcUsersEditErrors</li>";
       }

       $errorMessageLcUserEdit .= "</ul>";

  	  }




  }
?>