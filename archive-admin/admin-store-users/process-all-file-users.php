<?php

   if (isset($_POST['findButtonUsers'])) {
   	
   	   if (isset($_POST['usersOfFiles']) && $_POST['usersOfFiles'] == 'allUsers') {
   	   	


   	   	    $theAllUsers = "SELECT * FROM users";

   	   	    $queryAllUsers = mysqli_query($db_connection ,$theAllUsers);

   	   	    if (!$queryAllUsers) {
   	   	    	
   	   	    	die("could not query QUERYALLUSERS" .mysqli_error($db_connection));
   	   	    }


   	   	    $table = "<table class='table table-striped table-bordered'>";
   	   	    $table .= "<tr>";
   	   	    $table .= "<th>S/N</th>";
   	   	    $table .= "<th>Fullname</th>";
   	   	    $table .= "<th>Username</th>";
   	   	    $table .= "<th>Email</th>";
   	   	    $table .= "<th>Department</th>";
   	   	    $table .= "<th>Password</th>";
   	   	    $table .= "<th>Registration Date</th>";
   	   	    $table .= "</tr>";

   	   	    while ($fetchAllUsers = mysqli_fetch_assoc($queryAllUsers)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchAllUsers['users_FullName']}</td>";
   	   	    	$table .= "<td>{$fetchAllUsers['usersUsername']}</td>";
   	   	    	$table .= "<td>{$fetchAllUsers['users_email']}</td>";
   	   	    	$table .= "<td>{$fetchAllUsers['users_department']}</td>";
   	   	    	$table .= "<td>{$fetchAllUsers['usersPassword']}</td>";
   	   	    	$table .= "<td>{$fetchAllUsers['usersRegDate']}</td>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>