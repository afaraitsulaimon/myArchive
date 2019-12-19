<?php

   if (isset($_POST['findButtonFiles'])) {
   	
   	   if (isset($_POST['filesDetails']) && $_POST['filesDetails'] == 'billsFiles') {
   	   	


   	   	    $theBillsFiles = "SELECT * FROM storefile WHERE dept_StoreFile = 'Bills' ";

   	   	    $queryTheBillsFiles = mysqli_query($db_connection ,$theBillsFiles);

   	   	    if (!$queryTheBillsFiles) {
   	   	    	
   	   	    	die("could not query QUERYTHEBILLSFILES " .mysqli_error($db_connection));
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

   	   	    while ($fetchTheBillsFiles = mysqli_fetch_assoc($queryTheBillsFiles)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchTheBillsFiles['storeFileNo']}</td>";
   	   	    	$table .= "<td>{$fetchTheBillsFiles['dept_StoreFile']}</td>";
   	   	    	$table .= "<td>{$fetchTheBillsFiles['assignedUsers']}</td>";

                  $theFilePicker = "SELECT * FROM store_admin WHERE id = '".$fetchTheBillsFiles['storePickerId']."' ";
                  $queryTheFilePicker = mysqli_query($db_connection,$theFilePicker);

                  if (!$queryTheFilePicker) {
                     die("could not query QUERY THE FILEPICKER" .mysqli_error($db_connection));
                  }

                  $fetchThePicker = mysqli_fetch_assoc($queryTheFilePicker);

   	   	    	$table .= "<td>{$fetchThePicker['store_userFullName']}</td>";

   	   	    	$table .= "<td>{$fetchTheBillsFiles['pickUpDate']}</td>";
                  $table .= "<td><a href=''><button>Edit</button></a></td>";
                  $table .= "<td><button>Delete</button></td>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>