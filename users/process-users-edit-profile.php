<?php

    if (isset($_POST['userEditProfileButton'])) {
    	
        $userEditProfileErr = array();

        $usersNewFullName = sanitize($_POST['editUserFullName']);

        $usersNewUserName = sanitize($_POST['editUser_username']);

        $usersNewEmailAdd = sanitize($_POST['editUserEmail']);



        if (isset($_POST['editUserDepartment']) && $_POST['editUserDepartment'] == 'Bills') {
        	
           $theDept_Bills = $_POST['editUserDepartment'];
        }


     if (isset($_POST['editUserDepartment']) && $_POST['editUserDepartment'] == 'LC') {
     	
        $theDept_Lc = $_POST['editUserDepartment'];
     }


     if (isset($_POST['editUserDepartment']) && $_POST['editUserDepartment'] == 'Non-Valid') {
     	
        $theDept_NonValid = $_POST['editUserDepartment'];
     }

     if (isset($_POST['editUserDepartment']) && $_POST['editUserDepartment'] == 'Export') {
     	
        $theDept_export = $_POST['editUserDepartment'];
     }

     if (isset($_POST['editUserDepartment']) && $_POST['editUserDepartment'] == 'Invisible') {
     	
        $theDept_invisible = $_POST['editUserDepartment'];
     }


     if (isset($_POST['editUserDepartment']) && $_POST['editUserDepartment'] == 'ADA') {
     	
        $theDept_Ada = $_POST['editUserDepartment'];
     }



   // check for errors

     if (empty($usersNewFullName)) {
     	
     	$userEditProfileErr[] = "Enter full name";
     }

     if (strlen($usersNewFullName) <= 6) {
     	
     	$userEditProfileErr[] = "Fulname must be more than 6";
     }


     if (empty($usersNewUserName)) {
     	
     	$userEditProfileErr[] = "Enter username";
     }

     if (strlen($usersNewUserName) <= 6) {
     	
     	$userEditProfileErr[]  = "Username must be more than 6 letter";
     }


     if (empty($usersNewEmailAdd)) {
     	
     	$userEditProfileErr[] = "enter Email Addres";
     }




       if (isset($_POST['editUserDepartment']) && $_POST['editUserDepartment'] == 'noEditDepartment') {
       	
       	$userEditProfileErr[]  = "Select a department";
       }


//when no error occured
if (empty($userEditProfileErr)) {

	  $theUserIdNo = loggedInUser();
	
	$updateUserProfile = "UPDATE users SET users_FullName = '$usersNewFullName', usersUsername = '$usersNewUserName', users_email = '$usersNewEmailAdd' , users_department = '".$_POST['editUserDepartment']."' WHERE user_id = $theUserIdNo ";

	$query_UpdateUserProfile = mysqli_query($db_connection, $updateUserProfile);

	if (!$query_UpdateUserProfile) {
		
		die("could not query QUERY_UPDATEUSERPROFILE" .mysqli_error($db_connection));
	}



	header("location:user-edit-profile.php?profileUpdateStatus=great");

	exit();

}else{

	$userUpdateErrMessage = "<ul>";

	foreach ($userEditProfileErr as $userEditProfileErrors) {
		
		$userUpdateErrMessage .= "<li>$userEditProfileErrors</li>";
	}

	$userUpdateErrMessage .= "</ul>";
}







    }
?>