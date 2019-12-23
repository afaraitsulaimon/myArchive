<?php
    if (isset($_POST['userEditBut'])) {
    	
    	$invisibleEditUserErr = array();

    	$invisibleEditUser_name = sanitize($_POST['nameOfUser']);

    	$invisibleEditUser_username= sanitize($_POST['usernameOfUser']);

    	$invisibleEditUser_email = sanitize($_POST['emailOfUser']);

    	$invisibleUserId = sanitize($_POST['usersId']);



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

  if (empty($invisibleEditUser_name)) {
  	$invisibleEditUserErr[] = "Enter a name";
  }


   if (empty($invisibleEditUser_username)) {
  	$invisibleEditUserErr[] = "Enter a username";
  }


   if (empty($invisibleEditUser_email)) {
  	$invisibleEditUserErr[] = "Enter an email";
  }


if (isset($_POST['fileUserDept']) && $_POST['fileUserDept'] == 'deptNotPicked') {
    		
    		$invisibleEditUserErr[] = "Select a department";
    	}



if (empty($invisibleEditUserErr)) {
	
	$updateInvisibleUser = "UPDATE users SET users_FullName = '$invisibleEditUser_name', usersUsername = '$invisibleEditUser_username', users_email = '$invisibleEditUser_email',users_department = '".$_POST['fileUserDept']."', usersRegDate = NOW() WHERE user_id = $invisibleUserId";


	  $queryUpdateInvisible = mysqli_query($db_connection, $updateInvisibleUser);

	  if (!$queryUpdateInvisible) {
	  	
	  	die("could not query QUERYUPDATE INVISIBLE" .mysqli_error($db_connection));
	  }

	  header("Location:edit-fileusers-admin.php?invisibleUpdate=success");

	  exit();
}else{

	$errorMessInvisibleUserUpdate = "<ul>";

	foreach ($invisibleEditUserErr as $invisibleEditUserErrors) {
		$errorMessInvisibleUserUpdate = "<li>$invisibleEditUserErrors</li>";
	}
	
	$errorMessInvisibleUserUpdate = "</ul>";
}


    




    }

?>