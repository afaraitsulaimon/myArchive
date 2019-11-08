

<?php
//TO REMOVE ALL THE UNWANTED TAGS FROM INPUTTING INTO OUR DATABASE
function sanitize($data){

	$data = trim($data);
	$data = strip_tags($data);
	return $data;
}

// TO CHECK THE STORE ADMIN THAT IS LOGGED IN
	function loggedInStore(){
		if(isset($_SESSION['storeAdmin_id'])){
		  return $_SESSION['storeAdmin_id']; 
		}else{
			return false;
		}
	}

    // TO CHECK IF THE STORE ADMIN IS NOT LOGGED IN
    //SO AS NOT TO BE ABLE TO OPEN A PAGE THAT NEEDS LOGGEDIN BEFORE
    //ACCESSING
	function notLoggedInStore(){
		if(loggedIn() == false){

       header("location:store-login-reg.php");
		}
	}
	




?>