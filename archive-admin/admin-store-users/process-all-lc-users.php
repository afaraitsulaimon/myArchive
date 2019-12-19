<?php

   if (isset($_POST['findButtonUsers'])) {
   	
   	   if (isset($_POST['usersOfFiles']) && $_POST['usersOfFiles'] == 'lcUsers') {
   	   	


   	   	    $theLcUsers = "SELECT * FROM users WHERE users_department = 'LC' ";

   	   	    $queryLcUsers = mysqli_query($db_connection ,$theLcUsers);

   	   	    if (!$queryLcUsers) {
   	   	    	
   	   	    	die("could not query QUERYALL-LC-USERS" .mysqli_error($db_connection));
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
                $table .= "<th>Edit</th>";
                $table .= "<th>Delete</th>";
   	   	    $table .= "</tr>";

   	   	    while ($fetchLcUsers = mysqli_fetch_assoc($queryLcUsers)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchLcUsers['users_FullName']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['usersUsername']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['users_email']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['users_department']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['usersPassword']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['usersRegDate']}</td>";
                  $table .= "<th><a href=''><button>Edit</button></a></th>";
                  $table .= "<th><button>Delete</button></th>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>