<?php
   if (isset($_POST['editPersonelButton'])) {
   	
   	  $editPersonelErr = array();

   	  $theEditedPerName = sanitize($_POST['editPersonelName']);

   	  $theEditedPeruserName = sanitize($_POST['editPersonelUsername']);

   	  $theEditedPerEmail = sanitize($_POST['editPersonelEmail']);

     
   	  $theEditedDate = sanitize($_POST['editPersonelName']);

   	  $theIdNo = sanitize($_POST['personelIdNo']);


    if (isset($_POST['editPersonelDept']) && $_POST['editPersonelDept'] == 'LC') {
    	
    	$theNewPersonelDept = $_POST['editPersonelDept'];
    }


    if (isset($_POST['editPersonelDept']) && $_POST['editPersonelDept'] == 'Bills') {
    	
    	$theNewPersonelDept = $_POST['editPersonelDept'];
    }


    if (isset($_POST['editPersonelDept']) && $_POST['editPersonelDept'] == 'Invisible') {
    	
    	$theNewPersonelDept = $_POST['editPersonelDept'];
    }

    if (isset($_POST['editPersonelDept']) && $_POST['editPersonelDept'] == 'Non-Valid') {
    	
    	$theNewPersonelDept = $_POST['editPersonelDept'];
    }


    if (isset($_POST['editPersonelDept']) && $_POST['editPersonelDept'] == 'Export') {
    	
    	$theNewPersonelDept = $_POST['editPersonelDept'];
    }



// check for error

    if (empty($theEditedPerName)) {
    	
    	$editPersonelErr[] = "Enter Full name";
    }


    if (empty($theEditedPeruserName)) {

    	$editPersonelErr[] = "Enter a Username";

    }


if (empty($theEditedPerEmail)) {
	
	$editPersonelErr[] = "Enter Email addrress";
}


if (isset($_POST['editPersonelDept']) && $_POST['editPersonelDept'] == 'noEditDept') {
	
	$editPersonelErr[] = "Select Department";

}



if (empty($editPersonelErr)) {
	
	$updatePersonelDet = "UPDATE store_admin SET store_userFullName = '$theEditedPerName', store_username = '$theEditedPeruserName', store_user_email = '$theEditedPerEmail', store_user_dept = '". $_POST['editPersonelDept'] ."', store_user_regDate = NOW() WHERE id = $theIdNo";



	$queryUpdatePerdet = mysqli_query($db_connection, $updatePersonelDet);


	if (!$queryUpdatePerdet) {
		
		die("could not query QUERYUPDATEPERDET" .mysqli_error($db_connection));
	}

	header("Location:edit-store-administrative.php?editPersonnel=successful");
	exit();
}else{

	$editPerErrorMessage = "<ul>";

	foreach ($editPersonelErr as $editPersonelErrs) {
		
		$editPerErrorMessage .= "<li>$editPersonelErrs</li>";
	}

	$editPerErrorMessage .= "</ul>";
}


   }


?>