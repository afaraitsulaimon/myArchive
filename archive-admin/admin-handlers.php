<?php

//TO REMOVE ALL THE UNWANTED TAGS FROM INPUTTING INTO OUR DATABASE
function sanitize($data){

	$data = trim($data);
	$data = strip_tags($data);
	return $data;
}


// TO CHECK THE ADMINISTRATOR THAT IS LOGGED IN
	function adminstratorLogin(){
		if(isset($_SESSION['administratorId'])){
		  return $_SESSION['administratorId']; 
		}else{
			return false;
		}
	}

    // TO CHECK IF THE ADMINISTRATOR IS NOT LOGGED IN
    //SO AS NOT TO BE ABLE TO OPEN A PAGE THAT NEEDS LOGGEDIN BEFORE
    //ACCESSING
	function notAdministartorLogin(){
		if(adminstratorLogin() == false){

       header("Location:admin-archive-login.php");
		}
	}

?>