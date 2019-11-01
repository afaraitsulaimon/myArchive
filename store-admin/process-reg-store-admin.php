<?php

 require_once("../database/db_connect.php");
require_once("../handler/handler.php");

// FIRST CHECKING IF THE SUBMIT BUTTON WAS CLICKED

if(isset($_POST['storeUserRegisterButton'])){
	
// STORE THE TOTAL ERROR IN A VARIABLE AS AN ARRAY
//ALSO STORE ALL THE INPUT FROM THE FORM 

	$storeRegError = array();
	$theStoreUserFullName = sanitize($_POST['storeRegFullName']);
	$theStoreUsername = sanitize($_POST['storeRegUserName']);
	$theStoreEmail = sanitize($_POST['storeRegUserEmail']);	
	
	if (isset($_POST['storeAdminDept']) && $_POST['storeAdminDept'] == 'Bills') {

		$theStoreDepart = $_POST['storeAdminDept'];
	}

    if (isset($_POST['storeAdminDept']) && $_POST['storeAdminDept'] == 'LC') {

		$theStoreDepart = $_POST['storeAdminDept'];
	}


   if (isset($_POST['storeAdminDept']) && $_POST['storeAdminDept'] == 'Non-Valid') {

		$theStoreDepart = $_POST['storeAdminDept'];
	}

    if (isset($_POST['storeAdminDept']) && $_POST['storeAdminDept'] == 'Export') {

		$theStoreDepart = $_POST['storeAdminDept'];
	}

	    if (isset($_POST['storeAdminDept']) && $_POST['storeAdminDept'] == 'Invisible') {

			$theStoreDepart = $_POST['storeAdminDept'];
		}




	$theStorePassCode = sanitize($_POST['storeRegUserPw']);
    $theStoreConfirmPass = sanitize($_POST['storeRegUserConfirmPw']);

// CHECK IF ANY OF THE FIELD IS EMPTY7 AFTER THE CLICK OF SUBMIT BUTTON

if (empty($theStoreUserFullName)) {
	$storeRegError[] = "Please enter Full name";
}

if (empty($theStoreUsername)) {
	$storeRegError[] = "Please enter a Username";
}

if (empty($theStoreEmail)) {
	$storeRegError[] = "Please enter Email Address";
}


if (!isset($_POST['storeAdminDept'])) {
	
	$storeRegError[] ="Select Department";
     
}

if (isset($_POST['storeAdminDept']) && $_POST['storeAdminDept'] == 'null') {
	
	$storeRegError[] ="Select Department";
     
}


if (empty($theStorePassCode)) {
	$storeRegError[] = "Please enter Password";
}

if (empty($theStoreConfirmPass)) {
	$storeRegError[] = "Please Confirm Password";
}

//check if the password does not match with the confirm password, throw error

if ($theStorePassCode !== $theStoreConfirmPass) {
	$storeRegError[] = "Password does not match";
}

//check if the length of the password is less than 6 or7 not upto see

   

if (strlen($theStorePassCode) <= 6) {
	
	$storeRegError[] = "Password too short";
}


if (empty($storeRegError)) {

$storeSql = "INSERT INTO store_admin(store_userFullName,store_username,store_user_email,	store_user_dept,store_user_password,store_user_regDate) VALUES('$theStoreUserFullName','$theStoreUsername','$theStoreEmail','$theStoreDepart','$theStorePassCode',NOW())";


$queryStore = mysqli_query($db_connection,$storeSql);

if (!$queryStore) {
	
	die("could not query queryStore" .mysqli_error($db_connection));
}

 header("location:store-login-reg.php?status=successfulReg");
 exit();
 
}else{

	$storeMessageError ="<ul>";

        	foreach ($storeRegError as $storeRegErrors) {
        		
        		$storeMessageError .="<li>$storeRegErrors</li>";
        	}

        	    $storeMessageError .= "</ul>";
}











}





?>