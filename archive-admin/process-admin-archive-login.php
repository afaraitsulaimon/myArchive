<?php


   if (isset($_POST['adminiEnterButton'])) {
   	  

   	 //variable for error message stored in an array

   	$administratorErr = array();

   	//get each value in each input

   	$theAdministratorUser = sanitize($_POST['administratorUsername']);


     $theAdministratorPass = sanitize($_POST['administratorPass']);


// check for error ,like if nothing is inputted or if the username and paassword is incorrect

     if (empty($theAdministratorUser)) {
     	
     	$administratorErr[] = "Enter your username";
     }


     if (empty($theAdministratorPass)) {
     	
     	$administratorErr[] = "Enter your password";
     }


     $administratorsDetails = "SELECT * FROM administrator WHERE username = '$theAdministratorUser' AND passcode = '$theAdministratorPass' ";


     $queryAdminDetails = mysqli_query($db_connection,$administratorsDetails);


     if (!$queryAdminDetails) {
     	
     	die("could not query QUERYADMINDETAILS" .mysqli_error($db_connection));
     }


     $fetchAdminDetails = mysqli_fetch_assoc($queryAdminDetails);

      $theUserOfAdministrator = $fetchAdminDetails['username'];

      $theCodeOfAdministrator = $fetchAdminDetails['passcode'];


      if ($theAdministratorUser !== $theUserOfAdministrator || $theAdministratorPass !== $theCodeOfAdministrator) {

      	$administratorErr[] = "Incorrect Username or password";
      }




 
// if no error occur, then proceed to login

     if (empty($administratorErr)) {
     	
     	$sqlAdministrator = "SELECT * FROM administrator WHERE username = '$theAdministratorUser' AND passcode = '$theAdministratorPass' ";

     	$administratorQuery = mysqli_query($db_connection, $sqlAdministrator);


     	if (!$administratorQuery) {
     		
     		die("could not query ADMINISTRATORQUERY" .mysqli_error($db_connection));
     	}


     	//check the number of rows

     	$administratorRows = mysqli_num_rows($administratorQuery);

//if the number of rows found is 1, 
     	//fetch the details
     	//store the id in a session
     	if ($administratorRows = 1) {
     		
     		$fetchAdministrator = mysqli_fetch_assoc($administratorQuery);

     		$_SESSION['administratorId'] = $fetchAdministrator['admin_id'];

     		header("Location:administrator-dashboard-archive.php");
     		exit();

     	}

     }else{

     	$errorMessageLogin = "<ul>";

     	foreach ($administratorErr as $administratorErrors) {
     		
     		$errorMessageLogin .= "<li>$administratorErrors</li>";
     	}

     	$errorMessageLogin .= "</ul>";
     }










   }


?>