<?php
  require_once('../database/db_connect.php');
  require_once('../handler/handler.php');

   if (isset($_POST['searchButton'])) {
   	    //store the error in a variable

   	  $searchErr = array();

   	  //store the input in the text field in a variable

   	  $theSearchNo = sanitize($_POST['searchFile']);

   	  // check if the input field is empty

   	  if (empty($theSearchNo)) {
   	  	
   	  	   $searchErr [] = "Enter File Number";
   	  }

// IF THEIR IS NO EMPTY FIELD OR NO ERROR FOUND, THEN FOR FILE
      if (empty($searchErr)) {
      	
      	$searchForFile = "SELECT * FROM storefile WHERE dept_StoreFile = '$theSearchNo' ";

      	$query_searchForFile = mysqli_query($db_connection, $searchForFile);

      	if (!$query_searchForFile) {
      		
      		die("could not query QUERY_SEARCHFORFILE" .mysqli_error($db_connection));
      	}

      	//check the numbers of rows the result display

      	$rowsSearchForFile = mysqli_num_rows($query_searchForFile);

      	$table = "<table>";
      	$table .= "<tr>";
      	$table .= "<th>#</th>";
      	$table .= "<th>File No</th>";
      	$table .= "<th>File User</th>";
      	$table .= "<th>Picked Date</th>";
      	$table .= "</tr>";


   while ($fetchSearchForFile = mysqli_fetch_assoc($query_searchForFile)) {
   	
   	    $table .= "<tr>";
   	    $table .= "<td></td>";
   	    $table .= "<td>{$fetchSearchForFile['storeFileNo']}</td>";
   	    $table .= "<td>{$fetchSearchForFile['assignedUsers']}</td>";
   	    $table .= "<td>{$fetchSearchForFile['pickUpDate']}</td>";
   	    $table .= "</tr>";
   }

   $table .= "</table>";
   echo $table;
      }


   }


?>