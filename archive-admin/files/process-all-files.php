<?php

   if (isset($_POST['findButtonFiles'])) {
   	
   	   if (isset($_POST['filesDetails']) && $_POST['filesDetails'] == 'allFiles') {
   	   	


   	   	    $allTheFiles = "SELECT * FROM storefile";

   	   	    $queryAllTheFiles = mysqli_query($db_connection ,$allTheFiles);

   	   	    if (!$queryAllTheFiles) {
   	   	    	
   	   	    	die("could not query QUERYALL THE FILES " .mysqli_error($db_connection));
   	   	    }

              

   	   	    $table = "<table class='table table-striped table-bordered'>";
   	   	    $table .= "<tr>";
   	   	    $table .= "<th>S/N</th>";
   	   	    $table .= "<th>File Number</th>";
   	   	    $table .= "<th>Department</th>";
   	   	    $table .= "<th>Assigned User</th>";
   	   	    $table .= "<th>File Picker</th>";
   	   	    $table .= "<th>Pick-up Date</th>";
   	   	    $table .= "</tr>";

   	   	    while ($fetchAllTheFiles = mysqli_fetch_assoc($queryAllTheFiles)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchAllTheFiles['storeFileNo']}</td>";
   	   	    	$table .= "<td>{$fetchAllTheFiles['dept_StoreFile']}</td>";
   	   	    	$table .= "<td>{$fetchAllTheFiles['assignedUsers']}</td>";

                  $theFilePicker = "SELECT * FROM store_admin WHERE id = '".$fetchAllTheFiles['storePickerId']."' ";
                  $queryTheFilePicker = mysqli_query($db_connection,$theFilePicker);

                  if (!$queryTheFilePicker) {
                     die("could not query QUERY THE FILEPICKER" .mysqli_error($db_connection));
                  }

                  $fetchThePicker = mysqli_fetch_assoc($queryTheFilePicker);

   	   	    	$table .= "<td>{$fetchThePicker['store_userFullName']}</td>";

   	   	    	$table .= "<td>{$fetchAllTheFiles['pickUpDate']}</td>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>