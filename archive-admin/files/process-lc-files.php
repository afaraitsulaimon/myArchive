<?php

   if (isset($_POST['findButtonFiles'])) {
   	
   	   if (isset($_POST['filesDetails']) && $_POST['filesDetails'] == 'lcFiles') {
   	   	


   	   	    $theLcFiles = "SELECT * FROM storefile WHERE dept_StoreFile = 'LC' ";

   	   	    $queryTheLcFiles = mysqli_query($db_connection ,$theLcFiles);

   	   	    if (!$queryTheLcFiles) {
   	   	    	
   	   	    	die("could not query QUERY LC FILES " .mysqli_error($db_connection));
   	   	    }

              

   	   	    $table = "<table class='table table-striped table-bordered'>";
   	   	    $table .= "<tr>";
   	   	    $table .= "<th>S/N</th>";
   	   	    $table .= "<th>File Number</th>";
   	   	    $table .= "<th>Department</th>";
   	   	    $table .= "<th>Assigned User</th>";
   	   	    $table .= "<th>File Picker</th>";
   	   	    $table .= "<th>Pick-up Date</th>";
                $table .= "<th>Edit</th>";
                $table .= "<th>Delete</th>";
   	   	    $table .= "</tr>";

   	   	    while ($fetchTheLcFiles = mysqli_fetch_assoc($queryTheLcFiles)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchTheLcFiles['storeFileNo']}</td>";
   	   	    	$table .= "<td>{$fetchTheLcFiles['dept_StoreFile']}</td>";
   	   	    	$table .= "<td>{$fetchTheLcFiles['assignedUsers']}</td>";

                  $theFilePicker = "SELECT * FROM store_admin WHERE id = '".$fetchTheLcFiles['storePickerId']."' ";
                  $queryTheFilePicker = mysqli_query($db_connection,$theFilePicker);

                  if (!$queryTheFilePicker) {
                     die("could not query QUERY THE FILEPICKER" .mysqli_error($db_connection));
                  }

                  $fetchThePicker = mysqli_fetch_assoc($queryTheFilePicker);

   	   	    	$table .= "<td>{$fetchThePicker['store_userFullName']}</td>";

   	   	    	$table .= "<td>{$fetchTheLcFiles['pickUpDate']}</td>";
                  $table .= "<td><a href=''><button>Edit</button></a></td>";
                  $table .= "<td><button>Delete</button></td>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>