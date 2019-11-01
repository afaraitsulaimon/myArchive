

<?php
//TO REMOVE ALL THE UNWANTED TAGS FROM INPUTTING INTO OUR DATABASE
function sanitize($data){

	$data = trim($data);
	$data = strip_tags($data);
	return $data;
}

// TO CHECK THE USER THAT IS LOGGED IN
	function loggedIn(){
		if(isset($_SESSION["vend_id"])){
		  return $_SESSION["vend_id"]; 
		}else{
			return false;
		}
	}

    // TO CHECK IF THE USER IS NOT LOGGED IN
    //SO AS NOT TO BE ABLE TO OPEN A PAGE THAT NEEDS LOGGEDIN BEFORE
    //ACCESSING
	function notLoggedIn(){
		if(loggedIn() == false){

       header("location:admin-login.php");
		}
	}
	




?>