<?php

if (isset($_POST['userEditBut'])) {
	
	$billsEditUserErr = array();

	$billsUserFullName = sanitize($_POST['nameOfUser']);

	$billsUser_username = sanitize($_POST['usernameOfUser']);

	$billsUser_email = sanitize($_POST['emailOfUser']);

	$billsUserId = sanitize($_POST['usersId']);


	if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'LC') {
		
		$lcUsersDept = $_POST['fileUserDept'];
	}

	if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'Bills') {
		
		$billsUsersDept = $_POST['fileUserDept'];
	}


	if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'Invisible') {
		
		$invisibleUsersDept = $_POST['fileUserDept'];
	}



	if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'Non-Valid') {
		
		$nonValidUsersDept = $_POST['fileUserDept'];
	}

	if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'Export') {
		
		$exportUsersDept = $_POST['fileUserDept'];
	}


//check for errors

if (empty($billsUserFullName)) {

 	$billsEditUserErr[] = "Enter Fullname";
 } 


 if (strlen($billsUserFullName) <= 6 ) {

 	$billsEditUserErr[] = "Full name too short";
 } 



if (empty($billsUser_username)) {

 	$billsEditUserErr[] = "Enter Username";
 } 


 if (empty($billsUser_email)) {

  	$billsEditUserErr[] = "Enter email";
  } 


	 
  if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'deptNotPicked') {
  	
  	$billsEditUserErr[] = "Select a department";
  }
	
	//if no error found
  //then update 

	if (empty($billsEditUserErr)) {
		
		$updateBillsUsersDet = "UPDATE users SET users_FullName = '$billsUserFullName', usersUsername = '$billsUser_username', users_email = '$billsUser_email',users_department = '".$_POST['fileUserDept']."', usersRegDate = NOW() WHERE user_id = $billsUserId";

		$queryUpdateBillsUsers = mysqli_query($db_connection,$updateBillsUsersDet);


		if (!$queryUpdateBillsUsers) {
			
			die("could not query QUERY UPDATE BILLS USERS" .mysqli_error($db_connection));
		}


		header("Location:edit-fileusers-admin.php?billsUsersUpdate=correct");
		exit();

	}else{

		$errorMessBillsUserUpdate = "<ul>";

		foreach ($billsEditUserErr as $billsEditUserErrors) {
			
			$errorMessBillsUserUpdate .= "<li>$billsEditUserErrors</li>";
		}

		$errorMessBillsUserUpdate .= "</ul>";
	}















}

?>